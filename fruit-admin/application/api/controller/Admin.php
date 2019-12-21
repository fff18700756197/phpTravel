<?php


namespace app\api\controller;


use http\Params;
use think\captcha\Captcha;

class Admin
{
//1.得到一个哈希值
public function createHash(){
    return md5(time());
}
//f26dc22c7eb25d78c8734cffa3782a72

//2.得到一个密码 2.1加密函数
//public function createPassword(){
//    return md5(sha1("123456")."f26dc22c7eb25d78c8734cffa3782a72");
//}
//b9bc3f46045cbbebbe70210b52d77c0b
//2.1加密函数
public function createPassword($password,$hash){
    return md5(sha1("$password").$hash);
}

//3.验证登录
public function login(){
    $data=input('post.');
    //admin 123456
    $captcha=new Captcha();
    if (!$captcha->check($data["code"])){
        return json(["msg"=>"验证码错误","code"=>"400"]);
    }
    $username=$data["username"];
    $model=model("admin");
    $r=$model->where("username",$username)->find();
    if (isset($r)){//存在
        //判断黑白名单
        if ($r->state===0){
            return json(["msg"=>"暂时无法登录","code"=>"400"]);
        }

        $password=$data["password"];
        $hash=$r->hash;
        if ($r->password===$this->createPassword($password,$hash)){//是否匹配
            $date=$r->login_date;
            $r->save(["login_date"=>time()]);
            return json(["msg"=>"登录成功","code"=>"200",
                "data"=>[
                    "role"=>$r->role,
                    "date"=>$date
                ]
            ]);
        }else{
            return json(["msg"=>"登录失败","code"=>"400"]);
        }
    }else{//不存在
        return json(["msg"=>"登录失败","code"=>"400"]);
    }
}
//4.验证码图片
public function captcha(){
    $config =    [
        // 验证码字体大小
        'fontSize'    =>    20,
        // 验证码位数
        'length'      =>    4,
        // 关闭验证码杂点
        'useNoise'    =>    false,
        "imageW" => 143,
        "imageH" => 40
    ];
    $captcha = new Captcha($config);
    return $captcha->entry();
}
//5.密码修改
public function changePassword(){
    $data=input('put.');
    $username=$data["username"];
    $model=model("admin");
    $r=$model->where("username",$username)->find();
    $password=$this->createPassword($data["password"],$r->hash);
    if ($password!==$r->password){
        return json(["msg"=>"原始密码错误","code"=>400]);
    }
    $newpassword=$this->createPassword($data["newpassword1"],$r->hash);
    $res=$r->save(['password'=>$newpassword]);
    if ($res==1){
        return json(["msg"=>"修改成功","code"=>200]);
    }else{
        return json(["msg"=>"修改失败","code"=>400]);
    }
}
//6.添加管理员
public function addManager(){
    $username=input('post.username');
    $hash=$this->createHash();
    $password=$this->createPassword("123456",$hash);
    $model=model("admin");
    $r=$model->where("username",$username)->find();
    if (isset($r)){
        return json(["msg"=>"该管理员已存在","code"=>200]);
    }
    $r=$model->save(['username'=>$username,'password'=>$password,"hash"=>$hash]);
    if ($r==1){
        return json(["msg"=>"新增成功","code"=>200]);
    }else{
        return json(["msg"=>"新增失败","code"=>400]);
    }
}
//7.获取管理员
public function getManager(){
//    1.get获取数据
    $data=input("get.");
//    2.页数page
    $page=$data['page'];
//    3.每页大小
    $pageSize=$data['pageSize'];
//    4.起始
    $start=($page-1)*$pageSize;
//    5.$model引用模型
    $model=model('admin');
//    6.$res查询 角色为条件
    $res=$model->where("role",2)->limit($start,$pageSize)->select();
//    7.total总数
    $total=$model->where("role",2)->count();
//    8.return
    return json(["msg"=>"查询成功","code"=>200,"data"=>$res,"total"=>$total]);
}

//8.重置密码
public function resetPassword(){
    $id=input("put.");
    $model=model("admin");
    $r=$model->where("id",$id)->find();
    $password=$this->createPassword("123456",$r->hash);
    $res=$r->save(["password"=>$password]);
    if ($res==1){
        return json(["msg"=>"修改成功","code"=>200]);
    }else{
        return json(["msg"=>"修改失败","code"=>400]);
    }
}

//9.修改状态
    public function changeState(){
        $id=input("put.id");
        $state=input("put.state");
        $model=model("admin");
        $r=$model->where("id",$id)->find();
        $res=$r->save(["state"=>$state]);
        if ($res==1){
            return json(["msg"=>"修改成功","code"=>200]);
        }else{
            return json(["msg"=>"修改失败","code"=>400]);
        }
    }

}