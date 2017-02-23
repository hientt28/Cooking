<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Auth;
use Exception;
use Mail;
use DB;

class UsersRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create($input, $sendMailData)
    {
        try {
            $createUser = $this->model->create($input);
            Mail::send('emails.active_account', $sendMailData, function ($message) use ($sendMailData) {
                $message->to($sendMailData['email'], $sendMailData['name'])->subject(trans('label.confirm_register'));
            });
            return $createUser;
        } catch (Exception $ex) {
            return $createUser['error'] = trans('message.creating_error');
        }
    }

    public function updateConfirm($confirmationCode)
    {
        $user = $this->model->confirmationCode($confirmationCode)->first();
        $user->confirmation_code ='';
        $user->confirmed = config('common.user.confirmed.is_confirm');
        $user->save();
        if (!$user) {
            throw new Exception(trans('message.item_not_exist'));
        }
        return $user;
    }
}
