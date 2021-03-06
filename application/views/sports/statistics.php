<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
    $userid = ($this->session->userdata['logged_in']['userid']);
    $username = ($this->session->userdata['logged_in']['username']);

} else {
    header("location: login");
}
header("Content-Type: text/html; charset=utf-8");

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sports Zone</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url()?>assets/css/navbar.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body id="statistics" data-spy="scroll" data-target="sidebarMenu">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-nav">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()?>">Sport Zone 运动空间</a>
        </div>

        <!--到其他页面的导航按钮-->
        <div class="collapse navbar-collapse" id="header-nav">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="dropdown">
                    <a href="<?php echo site_url()."activity/show_all_act"?>" class="dropdown-toggle" data-toggle="dropdown">Activities<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url()."activity/show_all_act/"."0/1"?>">单人PK</a></li>
                        <li><a href="<?php echo site_url()."activity/show_all_act/"."1/1"?>">多人竞赛</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url()."activity/show_all_act/"."2/1"?>">小组活动</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url()."activity/create_activity"?>"><i class="fa fa-plus-circle text-center"></i></a></li>
                    </ul>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url()."community/show_com_page/".$userid?>">Community</a>
                </li>

                <li>
                    <a class="page-scroll" href="#content">Statistic</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."user_authentication/login_process"?>">User</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."user_authentication/logout"?>">Logout</a>
                </li>

                <li>
                    <a href="<?php echo site_url()."user_authentication/user_info_setting"?>"><i class="fa fa-cog"></i></a>
                </li>


            </ul>
        </div><!-- /.navbar-collapse-->
    </div>  <!--/.container-fluid-->
</nav>

<header>
    <!--主页面的背景图-->
    <div class="header-content">
        <div class="header-content-inner">

        </div>
    </div>
</header>

<section id="content">
    <div class="container">
        <div class="header text-center">
            <div class="user-portrait">
                <img src="<?php echo $userInfo['avatar']?>" class="img-circle">

                <p class="user-name"><?php echo $userInfo['username']?></p>
                <i class="fa fa-venus"></i>
                <p>一句话介绍一下自己吧</p>
            </div>
        </div>
        <div class="user-navbar">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <ul class="nav nav-tabs nav-justified">
                        <li><a href="<?php echo site_url()."user_authentication/show_admin_page/".$userInfo['userid']."/".$userInfo['username']?>">我的主页</a></li>
                        <li class="active"><a href="#">我的运动</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="body">
            <div class="row sidebar">
                <div class="col-md-3">
                    <div class="sports-sidebar">
                        <div class="list-group">
                            <a href="#statistic-box" class="list-group-item"><i class="fa fa-bar-chart"></i>运动数据</a>
                            <a href="#body-manage" class="list-group-item"><i class="fa fa-child"></i>身体管理</a>
                        </div>
                    </div>
                </div>



                <div class="col-md-9" id="statistic-box">
                    <div class="sports-statistics">
                        <div class="sports-week">
                            <h1>本周运动状况</h1>
                            <div class="sports-overview">
                                <span><i class="fa fa-clock-o fa-2x"></i>运动<mark id="week-sports-time">
                                        <?php echo $weekOverview['week_days']?>
                                    </mark>天</span>
                                <span><i class="fa fa-compass fa-2x"></i>跑步<mark id="week-sports-distance">
                                        <?php echo $weekOverview['week_distance']?>
                                    </mark>km</span>
                                <span><i class="fa fa-fire fa-2x"></i>燃烧<mark id="week-sports-calorie">
                                        <?php echo $weekOverview['week_calories']?>
                                    </mark>大卡</span>
                            </div>
                            <hr>
                            <div class="sports-time-analysis text-center">
                                <h2>运动距离</h2>
                                <div class="week-time-charts"></div>
                                <span>共跑步<mark><?php echo $weekOverview['week_days']?></mark>km</span>

                            </div>
                            <div class="calorie-time-analysis text-center">
                                <h2>运动燃烧热量</h2>
                                <div class="week-calorie-charts"></div>
                                <span>共消耗<mark><?php echo $weekOverview['week_calories']?></mark>千卡</span>
                                <!--x轴 时间 y轴 消耗卡路里
                                默认显示本周
                                用户设置同上-->
                            </div>
                        </div>
                        <hr>
                        <div class="sports-total">
                            <h1>你在sports zone总共</h1>
                            <div class="sports-overview">
                                <span><i class="fa fa-clock-o fa-2x"></i>运动<mark id="total-sports-time">
                                        <?php echo $totalOverview['total_days']?>
                                    </mark>天</span>
                                <span><i class="fa fa-compass fa-2x"></i>跑步<mark id="total-sports-distance">
                                        <?php echo $totalOverview['total_distance']?>
                                    </mark>km</span>
                                <span><i class="fa fa-fire fa-2x"></i>燃烧<mark id="total-sports-calorie">
                                        <?php echo $totalOverview['total_calories']?>
                                    </mark>k卡路里</span>
                            </div>

                            <div class="sports-total-courage text-center">
                                <h2>这些热量相当于</h2>
                                <div class="courage-box">
                                    <span>绕环形跑道(400/圈)<br><mark><?php echo $scalling['run_circle']?></mark></span>
                                    <span>消耗肥肉(公斤)<br><mark><?php echo $scalling['run_meat']?></mark></span>
                                    <span>省93#汽油(升)<br><mark><?php echo $scalling['run_gasoline']?></mark></span>
                                </div>
                            </div>

                            <div class="sports-time-analysis text-center">
                                <h2>运动距离</h2>
                                <div class="total-time-charts"></div>
                                <span>共跑步<mark><?php echo $totalOverview['total_distance']?></mark>km</span>

                            </div>
                            <div class="calorie-time-analysis text-center">
                                <h2>运动燃烧热量</h2>
                                <div class="total-calorie-charts"></div>
                                <span>共消耗<mark><?php echo $totalOverview['total_calories']?></mark>千卡</span>
                                <!--x轴 时间 y轴 消耗卡路里
                                默认显示本周
                                用户设置同上-->
                            </div>
                        </div>

                    </div>


                    <hr>

                    <div class="rankList">
                        <h1>排行榜</h1>
                        <div id="all-ranked">
                            <h2>达人排行榜</h2>
                            <div class="ranked-list">
                                <ul class="list-group">
                                    <?php foreach($topSportsInfo as $item):?>
                                        <li class="list-group-item">
                                            <a href="<?php echo site_url()."user_authentication/show_admin_page/".$item['userid']."/".$item['username']?>">
                                                <img src="<?php echo $item['avatar']?>" class="img-circle img-responsive">
                                                <span><?php echo $item['username']?></span>
                                            </a>
                                            <span class="badge"><?php echo $item['calories']?>千卡</span>
                                        </li>
                                    <?php endforeach;?>

                                </ul>
                            </div>

                        </div>
                        <div id="friends-ranked">
                            用户关注的以及关注用户的 其他用户与用户 进行
                            排序同上
                        </div>
                    </div>


                    <div id="body-manage">
                        <h1>身体数据</h1>
                        <div class="body-statistic">
                            <span>身高：<mark id="height"><?php echo $bodyInfo['height']?></mark>cm</span>
                            <span>体重：<mark id="weight"><?php echo $bodyInfo['weight']?></mark>kg</span>
                            <span>BMI：<mark id="bmi"><?php echo $bodyInfo['BMI']?></mark></span>
                            <span>体脂：<mark id="body-fat"><?php echo $bodyInfo['body_fat']?></mark></span>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="set-body-bttn">更改</button>
                            <div class="bd-example">

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="exampleModalLabel">我的数据</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <span class="form-group">
                                                        <label class="form-control-label">身高：</label>
                                                        <input type="text" class="form-control" id="height-post" value="<?php echo $bodyInfo['height']?>">cm
                                                    </span>
                                                    <span class="form-group">
                                                        <label class="form-control-label">体重：</label>
                                                        <input type="text" class="form-control" id="weight-post" value="<?php echo $bodyInfo['weight']?>">kg
                                                    </span>
                                                    <span class="form-group">
                                                        <label class="form-control-label">体脂：</label>
                                                        <input type="text" class="form-control" readonly="readonly" id="body-fat-post" value="<?php echo $bodyInfo['body_fat']?>">
                                                    </span>
                                                    <span class="form-group">
                                                        <label class="form-control-label">BMI：</label>
                                                        <input type="text" class="form-control" readonly="readonly" id="bmi-post" value="<?php echo $bodyInfo['BMI']?>">
                                                    </span>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <button type="button" class="btn btn-primary" id="change-body-bttn">更改</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="body-charts">
                        </div>

                    </div>


                </div>

            </div>
        </div>


    </div>

</section>

<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>

<script src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
<script src="http://cdn.hcharts.cn/highcharts/modules/exporting.js"></script>

<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>



<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>



<script type="text/javascript" src="<?php echo base_url()?>assets/js/scripts.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        var session_user = <?php echo $userid?>;
        var page_user = <?php echo $userInfo['userid']?>;

        if(session_user==page_user){
            $("#set-body-bttn").css("display:inline");
        }else{
            $("#set-body-bttn").css("display:none");
        }

        $(function () {
            $('.week-time-charts').highcharts({
                title: {
                    text: '本周运动距离',
                    x: -20 //center
                },
                subtitle: {
                    text: '来自：追踪器',
                    x: -20
                },
                xAxis: {
                    categories: [
                        <?php foreach($weekSportsInfo as $item):?>
                            '<?php echo $item['date']?>',
                        <?php endforeach;?>
                    ]
                },
                yAxis: {
                    title: {
                        text: '跑步距离(km)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: 'km'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name:'跑步距离',
                    data: [
                       <?php foreach($weekSportsInfo as $item):?>
                            <?php echo $item['distance']?>,
                       <?php endforeach;?>
                    ]
                }]
            });
        });

        $(function () {
            $('.week-calorie-charts').highcharts({
                chart: {
                    type:'area'
                },
                title: {
                    text: '本周运动燃烧热量',
                    x: -20 //center
                },
                subtitle: {
                    text: '来自：追踪器',
                    x: -20
                },
                xAxis: {
                    categories: [
                        <?php foreach($weekSportsInfo as $item):?>
                        '<?php echo $item['date']?>',
                        <?php endforeach;?>
                    ]
                },
                yAxis: {
                    title: {
                        text: '燃烧热量(cal)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: 'cal'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name:'卡路里',
                    data: [
                        <?php foreach($weekSportsInfo as $item):?>
                        <?php echo $item['distance']?>,
                        <?php endforeach;?>
                    ]
                }]
            });
        });

        $(function () {
            $('.total-time-charts').highcharts({
                title: {
                    text: '总运动距离',
                    x: -20 //center
                },
                subtitle: {
                    text: '来自：追踪器',
                    x: -20
                },
                xAxis: {
                    categories: [
                        <?php foreach($totalSportsInfo as $item):?>
                        '<?php echo $item['date']?>',
                        <?php endforeach;?>
                    ]
                },
                yAxis: {
                    title: {
                        text: '跑步距离(km)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: 'km'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name:'跑步距离',
                    data: [
                        <?php foreach($totalSportsInfo as $item):?>
                           <?php echo $item['distance']?>,
                        <?php endforeach;?>
                    ]
                }]
            });
        });

        $(function () {
            $('.total-calorie-charts').highcharts({
                chart: {
                    type:'area'
                },
                title: {
                    text: '总运动燃烧热量',
                    x: -20 //center
                },
                subtitle: {
                    text: '来自：追踪器',
                    x: -20
                },
                xAxis: {
                    categories: [
                        <?php foreach($totalSportsInfo as $item):?>
                        '<?php echo $item['date']?>',
                        <?php endforeach;?>
                    ]
                },
                yAxis: {
                    title: {
                        text: '燃烧热量(cal)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: 'cal'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name:'卡路里',
                    data: [
                        <?php foreach($totalSportsInfo as $item):?>
                        <?php echo $item['distance']?>,
                        <?php endforeach;?>
                    ]
                }]
            });
        });

//        $(function () {
//            $('.body-charts').highcharts({
//                title: {
//                    text: 'BMI变化表',
//                    x: -20 //center
//                },
//                xAxis: {
//                    categories: ['2016/10/01', '2016/10/08', '2016/10/15', '2016/10/21']
//                },
//                yAxis: {
//                    title: {
//                        text: 'BMI'
//                    },
//                    plotLines: [{
//                        value: 0,
//                        width: 1,
//                        color: '#808080'
//                    }]
//                },
//                legend: {
//                    layout: 'vertical',
//                    align: 'right',
//                    verticalAlign: 'middle',
//                    borderWidth: 0
//                },
//                series: [{
//                    name:'BMI',
//                    data: [18.4, 18.7, 19.1, 19.1]
//                }]
//            });
//        });

        $('#change-body-bttn').unbind('click').click(function(){

            var weight = $("#weight-post").val();
            var height = $("#height-post").val();
            var body_fat = $("#body-fat-post").val();

            alert ("<?php echo site_url()."sports/set_body_data/".$userInfo['userid']."/"?>"+weight+"/"+height+"/"+body_fat);

            $('.modal#exampleModal').modal("hide");
            $.ajax({
                type:"POST",
                url:"<?php echo site_url()."sports/set_body_data/".$userInfo['userid']."/"?>"+weight+"/"+height+"/"+body_fat,
                dataType:'json',
                data:{weight:weight,height:height,body_fat:body_fat},
                success:function(result){

                    if(result){

                        $("#height").html(result.height);
                        $("#weight").html(result.weight);
                        $("#body-fat").html(result.body_fat);
                        $("#bmi").html(result.BMI);

                    }
                }
            });
        });
    })
</script>

</body>
</html>