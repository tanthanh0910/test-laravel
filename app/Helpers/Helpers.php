<?php

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


function getFuzzySearchText($text): string
{
    if (empty(trim($text))) {
        return "";
    }

    $fuzzySearch = implode("%", str_split(trim($text))); // e.g. test -> t%e%s%t
    return "%$fuzzySearch%";
}

function randomNumber($length = 6): string
{
    $result = '';

    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

function sendEmailHelper($sendEmailTo, $subject, $viewBlade, $contentDataPushToViewBlade = [])
{

    Mail::send($viewBlade, $contentDataPushToViewBlade, function ($message) use ($sendEmailTo, $subject) {
        $message->from('laravel@gmail.com', 'Laravel');
        $message->to($sendEmailTo);
        $message->subject($subject);
    });

    if (Mail::failures()) {
        \Log::error("SEND EMAIL " . json_encode(Mail::failures()));
        // return response showing failed emails
    }
}

function removeOtherKeyInArray(array $arrayData, array $keys): array
{
    return Arr::except($arrayData, $keys);
}





