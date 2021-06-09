<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style> body {
        background-color:
    }
    
    .padding {
        padding: 2rem !important
    }
    
    .card {
        margin-bottom: 30px;
        border: none;
        -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
    }
    
    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #e6e6f2
    }
    
    h3 {
        font-size: 20px
    }
    
    h5 {
        font-size: 15px;
        line-height: 26px;
        color: #3d405c;
        margin: 0px 0px 15px 0px;
        font-family: 'Circular Std Medium'
    }
    
    .text-dark {
        color: #3d405c !important
    }</style>
</head>
<body>
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block" href="index.html" data-abc="true">abc.com</a>
               
                    
                    <p id="date"></p>
                
            </div>
            <div class="card-body">
                

                    <table style="padding: 25px; margin: 0 auto; font-family:'Open Sans', 'Helvetica', 'Arial';">
                        <tr>
                            
                            <td></td>
                            <td><h3 class="text-dark mb-1" style="text-align:center">    ABC School</h3>
                                <div style="text-align:center">478, Dhaka,BAngladesh</div>
                                <div style="text-align:center">www.abc schoool .com</div>
                                <div style="text-align:center">Email: info@tikon.com</div>
                                <div style="text-align:center">Phone: +91 9895 398 009</div></td>
                                <td></td>
                            
                        </tr>
                    </table>
                    
               
                
               
               
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                           
                            <tbody>
                                <tr>
                                    <td style="text-align:center" class="center"><b>Name</b></td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong"><b>{{@$editData['student']['name']}}</b></td>     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Fathers Name</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong">{{@$editData['student']['fname']}}</td>     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Mothers Name</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong">{{@$editData['student']['mnames']}}</td>     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Year</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    @foreach($years as $year)
                                    <?php if(@$editData->year_id == $year->id){ ?>
    
                                    <td style="text-align:center" class="left strong">{{$year->name}}</td> 
                                    <?php  } ?>
                                    
                                    @endforeach    
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Calss</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    @foreach($classes as $class)
                                    <?php if(@$editData->class_id == $class->id){ ?>
    
                                        <td style="text-align:center" class="left strong">{{$class->name}}</td> 
                                        <?php  } ?>
                                        
                                    @endforeach     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">ID_NO</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong">{{@$editData['student']['id_no']}}</td>     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Mobile</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong">{{@$editData['student']['mobile']}}</td>     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Address</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong">{{@$editData['student']['address']}}</td>     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Gender</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong">{{@$editData['student']['gender']}}</td>     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Religion</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong">{{@$editData['student']['religion']}}</td>     
                                </tr>
                                <tr>
                                    <td style="text-align:center" class="center">Dath of Birth</td>
                                    <td style="text-align:center" class="center"><b>:</b></td>
                                    <td style="text-align:center" class="left strong">{{@$editData['student']['dob']}}</td>     
                                </tr>
                                
                               
                            </tbody>
                        </table>
                   
                </div>
               
            </div>
            <br><hr><br>

            <div class="row mb-4">
                <div class="col-sm-4">   
                </div>
                <div class="col-sm-4 ">                                    
                </div>
                <div class="col-sm-4 ">
                    
                    <h3 class="text-dark mb-1"style="text-align:right">Principal/HeadMaster</h3>
                    
                </div>



            </div>
            
        </div>
    </div>
    <script>
        document.getElementById("date").innerHTML = Date();
        </script>
</body>
</html>