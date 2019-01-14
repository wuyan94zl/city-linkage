## 中国城市关联扩展

> 开发中经常会有地址数据类的需求，以此写一个简单的中国城市数据管理扩展（仅含中国城市数据且持续更新）

### 要求

- PHP >= 7.0.0
- Laravel >=  5.5.0

### 安装

首先安装Laravel >= 5.5.0 版本 并保证数据库连接正常

```
$ composer require eachdemo/city-linkage:dev-master
```

然后运行以下命令来发布城市资源

```
# 发布资源文件
$ php artisan vendor:publish --provider="Eachdemo\CityLinkage\CityServiceProvider"
# 生成数据库 表
$ php artisan migrate
# 填充表数据
$ php artisan db:seed --class=CitySeeder
```
> 注：`php artisan db:seed --class=CitySeeder` 失败时可以执行先 `composer dump-autoload` 再执行 `php artisan db:seed --class=CitySeeder` 填充
### 使用

------

**实例**

获取城市列表数据 `getData($id,$filed)` 参数`id`为城市id 默认0 即获取所有省份城市 `filed` 返回数据字段 默认`id,name,parent_id` 

```
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Eachdemo\CityLinkage\CityLinkage;

class DataController extends Controller
{	
    public function test(){
    	$city = CityLinkage::getData();   		# 获取所有省份城市
    	$city = CityLinkage::getData(1); 		# 获取北京市下所有区（北京id为1）
    }
}

```



获取一条数据 `getOne($id)` 

```
$city = CityLinkage::getOne(375);   		# 获取成都市
Array
(
    [id] => 375
    [name] => 成都市
    [parent_id] => 23
    [pinyin] => chengdu
    [initial] => c
    [initials] => cd
    [suffix] => 市
    [code] => 510100
    [order] => 1
)
```

更新一条数据 `updOne($id,$data)`

```
CityLinkage::updOne(375,['name'=>'四川成都市','pinyin'=>'sichuanchengdushi']);  
$city = CityLinkage::getOne(375);   		# 获取成都市
Array
(
    [id] => 375
    [name] => 四川成都市
    [parent_id] => 23
    [pinyin] => sichuanchengdushi
    [initial] => c
    [initials] => cd
    [suffix] => 市
    [code] => 510100
    [order] => 1
)
```

添加一条数据 `addOne($data)`

```
$data = [
	'name'=>'测试',
	'parent_id'=>2,
	'pinyin'=>'ceshi',
	'initial'=>'c',
	'initials'=>'cs',
	'suffix'=>'区'
]
CityLinkage::addOne($data); 
```

回收站处理 `recycleOne($id)` 

```
CityLinkage::recycleOne(1);  # 如果没有拉入回收站 则拉入回收站 反正则恢复
```

获取回收站数据`getRecycle()`

```
CityLinkage::getRecycle();
```

删除回收站一条数据`dltRecycleOne($id)`

```
CityLinkage::dltRecycleOne($id); # 如果数据没有存在回收站则不能删除
```

获取所有数据键值对`getKeyName()`

```
CityLinkage::getKeyName(); #获取的数据将以 id=>name 数组
Array
(
    [1] => 北京市
    [2] => 天津市
    [3] => 上海市
    [4] => 重庆市
    [5] => 河北省
    [6] => 山西省
    [7] => 内蒙古自治区
    ......
    ......
    ......
)
```
> 注：比较简陋，欢迎提出意见，乐意改成。后续会持续更新数据库数据
