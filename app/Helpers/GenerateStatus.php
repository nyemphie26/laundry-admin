<?php

namespace App\Helpers;

class GenerateStatus {
    public static function AssigningStatus($status)
    {
        switch ($status) {
            case '0':
                $result = 'You\'ve assigned. This work is ready for you';
                break;
            case '1':
                $result = 'Finish this work as soon as possible';
                break;
            case '2':
                $result = 'Cheers! You work is done.';
                break;
            
            default:
                $result = 'You\'ve assigned. This work is ready for you';
                break;
        }

       return $result;
    }

    public static function SummaryStatus($status)
    {
        switch ($status) {
            case '0':
                $result = 'Assigned';
                break;
            case '1':
                $result = 'On going';
                break;
            case '2':
                $result = 'Finished';
                break;
            
            default:
                $result = 'Sit and Relax';
                break;
        }

       return $result;
    }

    public static function forDriver($status)
    {
       switch ($status) {
        case 'picker':
            $result = 'Picking Up Job';
            break;
        case 'deliverer':
            $result = 'Delivering Job';
            break;
        case 'accepted':
            $result = 'You\'ve assigned. Pick this up in time';
            break;
        case 'picking':
            $result = 'Customer already told. Pick the order now!';
            break;
        case 'pickedup':
            $result = 'Drop the order to the store';
            break;
        case 'delivering':
            $result = 'Customer already told. Send to them as fast as possible!';
            break;
        case 'delivered':
            $result = 'Waiting customer confirmation';
            break;
        case 'completed':
            $result = 'Cheers! You work is done.';
            break;
        
        default:
            $result = 'Sit and Relax! Laundryman is working now';
            break;
       }

       return $result;
    }

    public static function forLaundryman($status)
    {
       switch ($status) {
        case 'accepted':
            $result = 'Waiting driver to pick up the order';
            break;
        case 'picking':
            $result = 'Driver is on his way to pick up';
            break;
        case 'pickedup':
            $result = 'The order deliver it to store soon!';
            break;
        case 'processing':
            $result = 'Customer already told. Finish as fast as possible!';
            break;
        case 'processed':
            $result = 'Sit and Relax! Let driver deliver this to customer';
            break;
        
        default:
            $result = 'Cheers! You work is done.';
            break;
       }

       return $result;
    }

    public static function forTracker($status)
    {
        switch ($status) {
            case 'placed':
                $result = 'Customer placed the order';
                break;
                
            case 'accepted':
                $result = 'Order accepted by Admin';
                break;

            case 'picking':
                $result = 'Driver on his way to picking up';
                break;

            case 'pickedup':
                $result = 'Order picked up by driver';
                break;

            case 'processing':
                $result = 'On proccess..';
                break;

            case 'processed':
                $result = 'Order is packed up';
                break;

            case 'scheduled':
                $result = 'Orders is ready to deliver';
                break;

            case 'delivering':
                $result = 'Driver on his way to delivering';
                break;

            case 'delivered':
                $result = 'Order delivered to customer';
                break;
            
            case 'completed':
                $result = 'Completed';
                break;

            default:
                $result = null;
                break;
        }

        return $result;
    }

    public static function iconTracker($status)
    {
        switch ($status) {
            case 'placed':
                $result = 'shopping_cart';
                break;
                
            case 'accepted':
                $result = 'done';
                break;

            case 'picking':
                $result = 'local_shipping';
                break;

            case 'pickedup':
                $result = 'inventory';
                break;

            case 'processing':
                $result = 'local_laundry_service';
                break;

            case 'processed':
                $result = 'dry_cleaning';
                break;

            case 'scheduled':
                $result = 'calendar_month';
                break;

            case 'delivering':
                $result = 'local_shipping';
                break;

            case 'delivered':
                $result = 'event_available';
                break;

            case 'completed':
                $result = 'task_alt';
                break;
            
            default:
                $result = null;
                break;
        }

        return $result;
    }
}