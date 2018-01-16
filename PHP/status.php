<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>表单控件大小</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
</head>
<body>
    <h1>案例1</h1>
    <form role="form">
        <div class="form-group">
            <label class="control-label">控件变大</label>
            <input type="text" class="form-control input-lg" placeholder="添加.input-lg，控件变大" />
        </div>

        <div class="form-group">
            <label class="control-label">正常大小</label>
            <input type="text" class="form-control" placeholder="正常大小" />
        </div>
        <div class="form-group">
            <label class="control-label">控件变小</label>
            <input type="text" class="form-control input-sm" placeholder="添加.input-sm，控件变小" />
        </div>
    </form>
    <br/>
    <br/>
    <br/>
    <h1>案例2</h1>
    <form role="form" class="form-horizontal">
        <div class="form-group">
            <div class="col-xs-4">
                <input class="form-control input-lg" type="text" placeholder=".col-xs-4" />
            </div>
            <div class="col-xs-4">
                <input class="form-control input-lg" type="text" placeholder=".col-xs-4"/>
            </div>
            <div class="col-xs-4">
                <input class="form-control input-lg" type="text" placeholder=".col-xs-4" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-5">
                <input class="form-control input-sm" type="text" placeholder=".col-xs-5" />

            </div>
            <div class="col-xs-7">
                <input class="form-control input-sm" type="text" placeholder=".col-xs-7" />
            </div>
        </div>
    </form>
    <a href="http://www.imooc.com/code/2356"><h2>原文地址</h2></a>

</body>
</html>