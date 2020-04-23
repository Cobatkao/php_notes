<?php
class WaterMark {

  protected $waterMark;

  public function __construct($waterMark)
  {
    $this->waterMark = $waterMark;
  }

  public function make(string $image, string $filename = null, int $pos = 3)
  {
    $res = $this->resource($image);
    $water = $this->resource($this->waterMark);
    $position = $this->position($res, $water, $pos);
    imagecopy($water, $res, $position['x'], $position['y'], 0, 0, imagesx($water), imagesy($water));
    $this->output($image)($res, $filename ?: $image);
  }

  protected function resource(string $image)
  {
    $info = getimagesize($image);
    $action = [1=>'imagecreatefromgif',2=>'imagecreatefromjpeg',3=>'imagecreatefrompng'];
    // 返回水印图片资源
    return $action[$info[2]]($image);
  }

  protected function position($res, $water, $pos)
  {
    $info = ['x' => 0, 'y' => 0];
    switch ($pos) {
      case 1:
          break;
      case 2:
          $info['x'] = (imagesx($res) - imagesx($res)) / 2;
          break;
      case 3:
          $info['x'] = (imagesx($res) - imagesx($res));
          break;
      case 4:
          $info['y'] = (imagesy($res) - imagesy($res)) / 2;
          break;
      case 5:
          $info['x'] = (imagesx($res) - imagesx($res)) / 2;
          $info['y'] = (imagesy($res) - imagesy($res)) / 2;
          break;
    }
    return $info;
  }

  protected function output(string $image)
  {
    $info = getimagesize($image);
    $action = [1=>'imagegif',2=>'imagejpeg',3=>'imagepng'];
    // 返回输出图片的函数
    return $action[$info[2]];
  }
}