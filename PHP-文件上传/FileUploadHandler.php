<?php
class FileUploadHandler
{
  protected $uploadDir;
  public function make(): array
  {
    $this->makeDir();
    $uploadedFiles = [];
    $formatted_files = $this->format();
     foreach($formatted_files as $file)
     {
       if ($file['error'] == 0 and is_uploaded_file($file['tmp_name']))
       {
          $target = $this->uploadDir.'/'.md5($file['name']).'.'.pathinfo($file['name'])['extension'];
          if (move_uploaded_file($file['tmp_name'], $target))
          {
            $uploadedFiles[] = [
              'name'=>$file['name'],
              'path'=>$target,
              'size'=>$file['size'],
            ];
          }
       }
     }
     return $uploadedFiles;
  }

  // 创建上传目录
  private function makeDir(): bool
  {
    $path = 'dest/'.date('Y/m/d');
    $this->uploadDir = $path;
    return is_dir($path) or mkdir($path, 0755, true);
  }

  // 统一格式化文件
  private function format(): array
  {
    $files = [];
    foreach($_FILES as $file)
    {
      if(is_array($file['name'])) {
        foreach($file['name'] as $idx=>$value)
        {
          $files[] = [
            'name'=>$file['name'][$idx],
            'type'=>$file['type'][$idx],
            'tmp_name'=>$file['tmp_name'][$idx],
            'error'=>$file['error'][$idx],
            'size'=>$file['size'][$idx]
          ];
        }
      } else {
        $files[] = $file;
      }
    }
    return $files;
  }
}