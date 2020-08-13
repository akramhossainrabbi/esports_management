<?php

namespace App\Http\Controllers;

use App\AdminInbox;
use App\AppUser;
use App\AppUserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class TransactionController extends Controller
{
    public function transactionView(Request $request)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();
        $balance = AppUserBalance::where('balance_user_id',$User->user_id)->first();
        return view('User.transaction')
            ->with('users',$User)
            ->with('balance',$balance);

    }

    public function withDraw(Request $request)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();
        $balance = AppUserBalance::where('balance_user_id',$User->user_id)->first();

        if ($balance==null){
            $request->session()->flash('message2','You have insufficient balance!');
            return back();
        }else{
            if ($balance->balance_amount>$request->amount_withdraw){
                $withdraw = new AdminInbox();
                $subject = 'withdraw';
                $status = 1;
                date_default_timezone_set("Asia/Dhaka");
                $local_time = date('d-m-Y h:i:s A');
    
                $withdraw->user_id=$User->user_id;
                $withdraw->admin_inbox_subject=$subject;
                $withdraw->payment_number=$request->mobile_number;
                $withdraw->amount=$request->amount_withdraw;
                $withdraw->account_type=$request->withdow_method;
                $withdraw->status=$status;
                $withdraw->date=$local_time;
                
                if ($withdraw->save()){
                    $pre_balance = AppUserBalance::where('balance_user_id',$User->user_id)->first();
                    $up_balance = AppUserBalance::find($pre_balance->balance_id);
                    $new_balance = $up_balance->balance_amount-$request->amount_withdraw;
                    $up_balance->balance_amount=$new_balance;

                    if ($up_balance->save()){
                        $name= "$User->user_first_name $User->user_last_name";
                        $username = $User->user_username;
                        $number = $request->mobile_number;
                        $amount_withdraw =$request->amount_withdraw;
                        $withdraw_method = $request->withdow_method;
                        $to_mail = 'esportsbdmail@gmail.com';
                        $data=array("name"=>$name,"username"=>$username,"number"=>$number,"amount_to_add"=>$amount_withdraw,"withdraw_method"=>$withdraw_method);
                        Mail::send('password.withdraw-notification',$data,function ($message) use ($name,$to_mail,$username,$number,$amount_withdraw,$withdraw_method){
                            $message->to($to_mail)
                                ->subject('Withdraw Money Request');
                        });
                        $request->session()->flash('message','Your withdraw request has been submitted!');
                        return back();
                    }
                }
            }elseif($balance->balance_amount==$request->amount_withdraw){
                $request->session()->flash('message2',"You can't withdraw that .25 Taka!");
                return back();
            }else{
                $request->session()->flash('message2','You have insufficient balance!');
                return back();
            }
        }

    }

    public function addMoneyView(Request $request)
    {
    $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->get();
    return view('User.bKash_add')
        ->with('users',$User);
    }

    public function addMoney(Request $request)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();

        $add_money_request = new AdminInbox();

        $request->validate([
            'amount_to_add'=>'required',
            'bkash'=>'required',
        ]);

        $subject = 'add money';
        $account_type = 'bkash';
        $status = 1;
        date_default_timezone_set("Asia/Dhaka");
        $local_time = date('d-m-Y h:i:s A');

        $add_money_request->user_id= $User->user_id;
        $add_money_request->admin_inbox_subject=$subject;
        $add_money_request->payment_number=$request->bkash;
        $add_money_request->amount=$request->amount_to_add;
        $add_money_request->account_type=$account_type;
        $add_money_request->status=$status;
        $add_money_request->date=$local_time;

        if ($add_money_request->save()){
            $name= "$User->user_first_name $User->user_last_name";
            $username = $User->user_username;
            $number = $request->bkash;
            $amount_to_add =$request->amount_to_add;
            $to_mail = 'playformoneyweb@gmail.com';
            $data=array("name"=>$name,"username"=>$username,"number"=>$number,"amount_to_add"=>$amount_to_add);
            Mail::send('password.notification_mail_two',$data,function ($message) use ($name,$to_mail,$username,$number,$amount_to_add){
                $message->to($to_mail)
                    ->subject('Add bKash Money Request');
            });
            $request->session()->flash('message','Your request has been submitted!');
            return back();
        }else{
            $request->session()->flash('message','Something went wrong!');
        }
        return back();

    }

    public function addRocketMoneyView(Request $request)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->get();
        return view('User.rocket_add')
            ->with('users',$User);
    }

    public function addRocketMoney(Request $request)
    {
        $User= AppUser::where('user_id',$request->session()->get('loggedUser'))->first();

        $add_money_request = new AdminInbox();

        $request->validate([
            'amount_to_add'=>'required',
            'rocket'=>'required',
        ]);

        $subject = 'add money';
        $account_type = 'rocket';
        $status = 1;
        date_default_timezone_set("Asia/Dhaka");
        $local_time = date('d-m-Y h:i:s A');

        $add_money_request->user_id= $User->user_id;
        $add_money_request->admin_inbox_subject=$subject;
        $add_money_request->payment_number=$request->rocket;
        $add_money_request->amount=$request->amount_to_add;
        $add_money_request->account_type=$account_type;;
        $add_money_request->status=$status;
        $add_money_request->date=$local_time;


        if ($add_money_request->save()){
            $name= "$User->user_first_name $User->user_last_name";
            $username = $User->user_username;
            $number = $request->rocket;
            $amount_to_add =$request->amount_to_add;
            $to_mail = 'playformoneyweb@gmail.com';
            $data=array("name"=>$name,"username"=>$username,"number"=>$number,"amount_to_add"=>$amount_to_add);
            Mail::send('password.notification-mail',$data,function ($message) use ($name,$to_mail,$username,$number,$amount_to_add){
                $message->to($to_mail)
                    ->subject('Add Rocket Money Request');
            });
            $request->session()->flash('message','Your request has been submitted!');
            return back();
        }else{
            $request->session()->flash('message','Something went wrong!');
        }
        return back();
    }
}
