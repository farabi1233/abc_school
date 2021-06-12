@php
   $registrationFee = App\Model\FeeCategoryAmmount::where(['fee_category_id'=>'2','class_id'=>$details->class_id])->first();
            $originalFee = $registrationFee->amount;
            $discount = $details['discount']['discount'];
            $discountTableFee = $discount/100*$originalFee;
            $finalFee = (int)$originalFee-(int)$discountTableFee;
@endphp

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly Fee PaySlip</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>

    <div class="caontainer">
        <h1 style="text-align: center;">Abc School</h1>
        <h3 style="text-align: center;">Email:abc@xyz.com</h3>
        <h3 style="text-align: center;">Phone:000 222 333</h3>
      
    </div>

    <div class="row">
        <div class="invoice-box ">
            
            <table cellpadding="0" cellspacing="0">
              
                
              
                <tr class="heading">
                    <td>
                    Office Copy
                    </td>
                    
                    <td>
                       
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Student ID No
                    </td>
                    
                    <td>
                        {{@$details['student']['id_no']}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Student Name
                    </td>
                    
                    <td>
                        {{@$details['student']['name']}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Father's Name
                    </td>
                    
                    <td>
                        {{@$details['student']['fname']}}
                    </td>
                </tr>
                
                <tr class="item">
                    <td>
                        Mother's Name
                    </td>
                    
                    <td>
                        {{@$details['student']['mnames']}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Roll
                    </td>
                    
                    <td>
                        {{@$details['roll']}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Academic Year
                    </td>
                    
                    <td>
                        {{@$details['student_year']['name']}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                       Class
                    </td>
                    
                    <td>
                        {{@$details['student_class']['name']}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                       Group
                    </td>
                    
                    <td>
                        {{@$details['student_group']['name']}}
                    </td>
                </tr>
                <tr class="item">
                    <td>
                       Shift
                    </td>
                    
                    <td>
                        {{@$details['student_shift']['name']}}
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                      Monthly Fee Fee
                    </td>
                    
                    <td>
                        {{$originalFee}} Tk
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                       Discount
                    </td>
                    
                    <td>
                        {{$discount}} %
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                       Discounted Monthly Fee
                    </td>
                    
                    <td>
                        {{$finalFee}} Tk
                    </td>
                </tr>
                <tr class="last-item">
                    <td>
                    </td>
                </tr>
            </table>
            <br>
            <footer>
                    
            </footer>
        </div>
        
    </div>
   
    

    <hr style="border: dashed; color: #DDD">
    <div class="row"></div>

    <div class="invoice-box ">
        
        <table cellpadding="0" cellspacing="0" style="margin-top: 480px">
          
           
            <tr class="heading">
                <td>
                Student Copy:
                </td>
                
                <td>
                  || Student ID #{{@$details['student']['id_no']}}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Student Name
                </td>
                
                <td>
                    {{@$details['student']['name']}}
                </td>
            </tr>
           
            <tr class="item">
                <td>
                    Roll
                </td>
                
                <td>
                    {{@$details['roll']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Academic Year
                </td>
                
                <td>
                    {{@$details['student_year']['name']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                   Class
                </td>
                
                <td>
                    {{@$details['student_class']['name']}}
                </td>
            </tr>
           
            
            <tr class="heading">
                <td>
                  Monthly Fee
                </td>
                
                <td>
                    {{$originalFee}} Tk
                </td>
            </tr>
            <tr class="heading">
                <td>
                   Discount
                </td>
                
                <td>
                    {{$discount}} %
                </td>
            </tr>
            <tr class="heading">
                <td>
                   Discounted Monthly Fee
                </td>
                
                <td>
                    {{$finalFee}} Tk
                </td>
            </tr>
            <tr class="last-item">
                <td>
                </td>
            </tr>
        </table>
    </div>
        <br>
        <footer>
                
        </footer>
    </div>
    
</body>
</html>