<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
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
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td>
                    <table >
                        <tr>
                            <td></td>
                            <td class="title" style="padding-left: 130px">
Abc School                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Dhaka,Bangladesh.<br>
                                www.abcschool.com
                            </td>
                            
                            <td>
                                SMS Tech Team<br>
                                abc@xyz.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
             
            <tr class="heading">
                <td>
                   Employee Information
                </td>
                
                <td>
                    ID #{{$details['id_no']}}
                </td>
            </tr>
            <tr class="last-item">
                <td>
                  Employee  Image
                </td>
                <td>
                    <img src="{{ public_path() .'upload/employee_images/' . $details['image'] }}" style="height:150px;width:150px">
                </td>
            </tr>
            <tr class="item">
                <td>
                    Employee ID No
                </td>
                
                <td>
                    {{$details['id_no']}}
                </td>
            </tr>
            <tr class="item">
                @php
                    $designation = App\Model\Designation::where('id',$details['designation_id'])->first();
                @endphp
                <td>
                    Designation
                </td>
                
                <td>
                    {{$designation['name']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Salary
                </td>
                
                <td>
                    {{$details['salary']}}  Tk
                </td>
            </tr>
            <tr class="item">
                <td>
                    Join Date
                </td>
                
                <td>
                    {{$details['join_date']}}
                </td>
            </tr>
            <tr class="heading">
                <td>
                   Employee Personal Information
                </td>
                <td>
                </td>
            </tr>
            <tr class="item">
                <td>
                    Employee Name
                </td>
                
                <td>
                    {{$details['name']}}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Father's Name
                </td>
                
                <td>
                    {{$details['fname']}}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Mother's Name
                </td>
                
                <td>
                    {{$details['mnames']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                   Date of Birth (D.O.B)
                </td>
                
                <td>
                    {{$details['dob']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                   Mobile No
                </td>
                
                <td>
                    {{$details['mobile']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                   Gender
                </td>
                
                <td>
                    {{$details['gender']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                   Religion
                </td>
                
                <td>
                    {{$details['religion']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                   Address
                </td>
                
                <td>
                    {{$details['address']}}
                </td>
            </tr>
            <tr class="last-item">
                <td>
                </td>
            </tr>
        </table>
        <footer>
                <i style="font-size: 12px;float:left">Created on : {{date("d M Y")}} by {{Auth::user()->name}}</i>
        </footer>
    </div>
</body>
</html>