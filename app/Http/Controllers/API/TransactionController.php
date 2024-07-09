<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AKAccount;
use App\Models\AKNotification;
use App\Models\AKTransaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{

    public function index()
    {
        $account = AKAccount::where('isOngoing',true)->orderBy("created_at", "desc")->first();
        $contributions = AKTransaction::where('account_id',$account->id)->orderBy("created_at", "desc")->get();
        return response()->json([
            'status' => true,
            'contributions' => $contributions,
        ], 200);
    }
    public function create()
    {
    }

    public function store()
    {
        $sum = 0;
        $receipt = strtoupper(uniqid() . 'AK');
        AKTransaction::create([
            'account_id' => request()->id,
            'amount' => request()->amount,
            'user_id' => request('user_id'),
            'type' => request()->transactionType,
            'treasurer_id' => Auth()->user()->id,
            'receipt' => $receipt
        ]);
        $account = [
            [
                'name' => (AKAccount::findOrFail(request('id')))->name,
                'value' => request('amount')
            ]
        ];
        $user = User::findOrFail(request('user_id'));
        $data = [
            'name' => $user->fname,
            'accounts' => $account,
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
            "sender_id" => Auth()->user()->id,
            "recepient_id" => $user->id,
            "message" => $message,
            "isRead" => false,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Transaction completed successfully',
        ], 200);
    }
    public function show($id)
    {
        $contributions = AKTransaction::where('user_id', $id)->get();
        return response()->json([
            'status' => true,
            'contributions'=>$contributions,
        ], 200);
    }

    public function get($account_id)
    {
        $contributions = AKTransaction::where('account_id', $account_id)->get();
        return response()->json([
            'status' => true,
            'contributions'=>$contributions,
        ], 200);
    }

    public function contributions($account_id,$user_id)
    {
        $contributions = AKTransaction::where([['user_id', $user_id],['account_id',$account_id]])->get();
        return response()->json([
            'status' => true,
            'contributions'=>$contributions,
        ], 200);
    }
    public function edit(AKTransaction $aKTransaction)
    {
        //
    }
    public function update($id)
    {
        AKTransaction::where('id', $id)->update([
            'account_id' => request()->account_id,
            'amount' => request()->amount,
            'user_id' => request('user_id'),
            'type' => request()->transactionType,
            'treasurer_id' => Auth()->user()->id
        ]);
        $acc = AKTransaction::findOrFail($id);
        $message = 'Sorry for the errors noted early on the receipt ' . ($acc->receipt) . '. A correction has been made to your account.';
        AKNotification::create([
            "sender_id" => Auth()->user()->id,
            "recepient_id" => request('user_id'),
            "message" => $message,
            "isRead" => false,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Transaction updated successfully',
        ], 200);
    }

    public function destroy(AKTransaction $aKTransaction)
    {
        //
    }
}
