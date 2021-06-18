<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Employee Monthly Payslip</title>
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
        
        .invoice-box table tr.total_attend_groupby_id td {
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
        
        @media  only screen and (max-width: 600px) {
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
    @php
    $date = date('Y-m' ,strtotime($total_attend_groupby_id['0']->date));
    if($date != ''){
        $where[] =['date','like',$date.'%'];
    }
    $total_attendance = App\Model\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$total_attend_groupby_id['0']->employee_id)->get();
    $singlesalary = (float)$total_attend_groupby_id['0']['user']['salary'];
    $salaryperday = (float)$singlesalary/30;
    $absentcount = count($total_attendance->where('attendance_status','Absent'));
    $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
    $totalsalary = (float)$singlesalary- (float)$totalsalaryminus;       
    @endphp

        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td>
                    <table >
                        <tr>
                            <td></td>
                            <td class="title" style="padding-left: 180px">
                                <img src="https://identityguide.hms.harvard.edu/files/hmsidentityguide/files/hms_logo_final_rgb.png?m=1580238232" style="width:100%; max-width:250px;">
                            </td>
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
                                www.abc-schoool.com
                            </td>
                            
                            <td>
                                Hosnain Ahammed <br>
                                xyz@gmail.com
                            </td>
                        </tr>
                    </table>
                    <hr><hr>
                </td>
            </tr>
           
            <tr class="heading">
                <td>
                    Employee Monthly Payslip - {{date('M Y',strtotime($total_attend_groupby_id['0']->date))}}<b></b>
                </td>
                
                <td>
                    ID #{{$total_attend_groupby_id['0']['user']['id_no']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Employee ID No
                </td>
                
                <td>
                    {{$total_attend_groupby_id['0']['user']['id_no']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Employee Name
                </td>
                
                <td>
                    {{$total_attend_groupby_id['0']['user']['name']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Basic Salary
                </td>
                
                <td>
                    {{$total_attend_groupby_id['0']['user']['salary']}}
                </td>
            </tr>
            <tr class="item">
                <td>
                   Total Absent (This month)
                </td>
                
                <td>
                    {{$absentcount}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Salary (This Month)
                </td>
                
                <td>
                    {{$totalsalary}}
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