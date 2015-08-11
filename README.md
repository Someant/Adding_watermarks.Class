#Adding_watermarks.Class.PHP
adding watermark to an image with GD library.

###Example:
```php
include "addwatermark.class.php";
$water=new addwatermark;
$water->Adding_watermarks($stamp,$im,$newpath)

//$stamp (logo url Note: only supports the PNG format example:http://yourdomain.com/images/logo.png) 

//$im (The original picture of path)--Supports PNG and JPG format

//$newpath (new images of path)
```

###For Ueditor:
* Ueditor --version:1.4.3 With PHP

```bash
/php/config.json

#12:
add  "imageWaterMarks": "url", /* 图片水印路径 (绝对路径或者URL) 如：http://yourdomain.com/images/logo.png 水印必须为PNG格式 */

/php/action_upload.php

#9:
include "addwatermark.class.php";
#52 #53:
add:
$water=new addwatermark;
$water->Adding_watermarks($CONFIG['imageWaterMarks'],'http://'.$_SERVER['SERVER_NAME'].$up->getFileInfo()['url'],'../../../'.substr($up->getFileInfo()['url'],1));
```

###Known BUG:
Use replace file method to adding watermark.
Pictures path cannot be created in the root directory of the Web,so you need to add '../' the specified path.

忘了说，我是一个英语渣+PHP菜鸟。
