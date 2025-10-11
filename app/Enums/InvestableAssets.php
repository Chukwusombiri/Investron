<?php 

namespace App\Enums;

enum InvestableAssets :string 
{
    CASE ONETOHUNDRED = '$1 thousand - $100 thousand';
    CASE HUNDREDTOONEMIL = '$100 thousand - $1 million';
    CASE ONETOFIVE = '$1 million - $5 million';
    CASE FIVETOTWENTYFIVE = '$5 million - $25 million';
    CASE TWENTYFIVETOFIFTY = '$25 million - $50 million';
    CASE ABOVEFIFTY = '$50+ million';
}