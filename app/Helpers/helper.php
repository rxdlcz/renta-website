<?php

function switchStatus($statNum)
{
    switch ($statNum) {
        case "0":
            return "Vacant";
            break;
        case "1":
            return "Occupied";
            break;
        case "2":
            return "Unpaid";
            break;
        case "3":
            return "Paid";
            break;
        case "4":
            return "Pending Balance";
            break;
        case "5":
            return "Unpaid Bills";
            break;
        case "6":
            return "Occupied";
            break;
        case "7":
            return "Occupied";
            break;
        case "8":
            return "New";
            break;
    }
}
