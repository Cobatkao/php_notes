<?php
class Captcha {
  
  protected $width;
  protected $height;
  protected $len;
  protected $res;
  protected $size;
  protected $font;
  protected $code;

  public function __construct(int $width = 120, int $height = 30, int $len = 5, int $size = 20)
  {
    $this->width = $width; 
    $this->height = $height; 
    $this->len = $len;
    $this->size = $size;
    $this->font = realpath('SourceHanSansSC-Bold.otf');
  }

  public function init()
  {
    $res = imagecreatetruecolor($this->width, $this->height);
    imagefill($this->res = $res, 0, 0, imagecolorallocate($res, 200, 200, 200));
    $this->content();
    $this->line();
    $this->pixel();
    $this->render();
    return $this->code;
  }

  protected function line()
  {
    for ($i = 0; $i < 6; $i++) {
      imagesetthickness($this->res, mt_rand(1,3));
      imageline(
        $this->res, 
        mt_rand(0, $this->width), 
        mt_rand(0, $this->height), 
        mt_rand(0, $this->width), 
        mt_rand(0, $this->height), 
        $this->colour()
      );
    }
  }

  protected function pixel()
  {
    for ($t = 0; $t <= 300; $t++) {
      imagesetpixel(
        $this->res,
        mt_rand(0, $this->width),
        mt_rand(0, $this->height),
        $this->colour()
      );
    }
  }

  protected function content()
  {
    $pool = array_merge(range(0,9), range('a','z'));

    for ($i = 0; $i < $this->len; $i++) {
      $box = imagettfbbox($this->size, 0, $this->font, $pool[array_rand($pool, 1)]);
      $angle = mt_rand(-20,20);
      $x = $this->width / $this->len * $i;
      $y = $this->height / 2 + ($box[1] - $box[7]) / 2;
      $text_colour = $this->contentColour();
      $this->code .= $code = strtoupper($pool[array_rand($pool, 1)]);
      imagettftext(
        $this->res,
        $this->size,
        $angle,
        $x,
        $y,
        $text_colour,
        $this->font,
        $code
      );
    }
  }

  protected function contentColour()
  {
    return imagecolorallocate($this->res, mt_rand(50, 150), mt_rand(50, 150), mt_rand(50, 150));
  }

  protected function colour()
  {
    return imagecolorallocate($this->res, mt_rand(100, 200), mt_rand(100, 200), mt_rand(100, 200));
  }

  public function render()
  {
    header('Content-Type: image/png');
    imagepng($this->res);
  }
}