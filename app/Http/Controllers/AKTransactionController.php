<?php

namespace App\Http\Controllers;

use App\Models\AKAccount;
use App\Models\AKNotification;
use App\Models\AKTransaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AKTransactionController extends Controller
{

    public function index()
    {
        $contributions= AKTransaction::orderBy("created_at","desc")->paginate(50);
        return view("dashboard.finance.contribution.show",compact("contributions"));
    }
    public function create()
    {
        $users = User::select('id', 'fname', 'lname')->get();
        $accounts = AKAccount::where('isOngoing',true)->select('id','name')->get();
        return view('dashboard.finance.contribution.create', compact('users','accounts'));
    }

    public function store()
    {
        $sum = 0;
        $receipt =strtoupper(uniqid().'AK');
        $collection = collect();
        $accounts = AKAccount::where('isOngoing', 1)->select('name','id')->get();
        foreach ($accounts as $account) {
            $collection->push(['name' => $account->name, 'value' => request()->account[$account->name]]);
            $collection->all();
            $sum += request()->account[$account->name];
            if ((request()->account[$account->name]) != 0) {
                AKTransaction::create([
                    'account_id'=>$account->id,
                    'amount'=>request()->account[$account->name],
                    'user_id'=>request('user_id'),
                    'type'=>request()->transactionType,
                    'treasurer_id'=>Auth()->user()->id,
                    'receipt'=>$receipt
                ]);
            }
        }
        $user=User::findOrFail(request('user_id'));
        $data = [
            'name' => $user->fname,
            'accounts' => $collection,
            'serial' => $receipt,
            'sum' => $sum,
            'treasurer' => Auth()->user()
        ];
        $pdf = Pdf::loadView('mails.receipt', $data);
        $pdf->setPaper('A5', 'landscape');
        Mail::send(
            'mails.message',
            $data,
            function ($message) use ($pdf, $user) {
                $message->to($user->email, $user->name)->subject('Receipt for ' . date('d/m/Y'))
                    ->attachData($pdf->output(), date('d/m/Y') . "_receipt.pdf");
            }
        );
        $message = 'Thank you for your transaction. A receipt has been emailed to you. Check and incase of any inquiries, contact us.';
        AKNotification::create([
            "sender_id"=>Auth()->user()->id,
            "recepient_id"=>$user->id,
            "message"=>$message,
            "isRead"=>false,
        ]);
        return back()->with('success','Transaction recorded successfully.');
    }
    public function show(AKTransaction $aKTransaction)
    {
        //
    }

    public function edit(AKTransaction $aKTransaction)
    {
        //
    }
    public function update($id)
    {
        AKTransaction::where('id',$id)->update([
            'account_id'=>request()->account_id,
            'amount'=>request()->amount,
            'user_id'=>request('user_id'),
            'type'=>request()->transactionType,
            'treasurer_id'=>Auth()->user()->id
        ]);
        $acc=AKTransaction::findOrFail($id);
        $message = 'Sorry for the errors noted early on the receipt '.($acc->receipt).'. A correction has been made to your account.';
        AKNotification::create([
            "sender_id"=>Auth()->user()->id,
            "recepient_id"=>request('user_id'),
            "message"=>$message,
            "isRead"=>false,
        ]);
        return back()->with('success','Transaction updated successfully');
    }

    public function destroy(AKTransaction $aKTransaction)
    {
        //
    }
}
