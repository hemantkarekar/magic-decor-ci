<?php

class Functions_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function sorting($arr, $order = 'ASC')
    {
        $result = $arr;
        switch ($order) {
            case 'ASC':
                for ($i = 0; $i < count($result) - 1; $i++) {
                    # code...
                    for ($j = 0; $j < count($result) - 1 - $i; $j++) {
                        # code...
                        if ($result[$j] > $result[$j + 1]) {
                            # SWAP
                            $tmp = $result[$j];
                            $result[$j] = $result[$j + 1];
                            $result[$j + 1] = $tmp;
                        }
                    }
                }
                break;

            case 'DESC':
                for ($i = 0; $i < count($result) - 1; $i++) {
                    # code...
                    for ($j = 0; $j < count($result) - 1 - $i; $j++) {
                        # code...
                        if ($result[$j] < $result[$j + 1]) {
                            # SWAP
                            $tmp = $result[$j];
                            $result[$j] = $result[$j + 1];
                            $result[$j + 1] = $tmp;
                        }
                    }
                }
                # code...
                break;

            default:
                for ($i = 0; $i < count($result) - 1; $i++) {
                    # code...
                    for ($j = 0; $j < count($result) - 1 - $i; $j++) {
                        # code...
                        if ($result[$j] > $result[$j + 1]) {
                            # SWAP
                            $tmp = $result[$j];
                            $result[$j] = $result[$j + 1];
                            $result[$j + 1] = $tmp;
                        }
                    }
                }
                # code...
                break;
        }
        return $result;
    }
    public function sort_array($arr, $order, $loop = false)
    {
        $result = $arr;
        if ($loop) {
            $result = $this->sorting($arr, $order);
        } else {
            switch ($order) {
                case 'ASC':
                    sort($result);
                    break;

                case 'DESC':
                    rsort($result);
                    # code...
                    break;

                default:
                    sort($result);
                    # code...
                    break;
            }
        }
        return $result;
    }

    public function inch_to_ft($inches)
    {
        $ft = 0;
        $in = $inches;

        $ft = floor($in / 12);

        $in = $in % 12;

        return array($ft,$in);
    }

    function closest_color($hexColor) 
    {
        
    }
    

    function set_background($jpgPath, $pngPath, $outputPath) {
        //JPG Background
        $jpgImage = imagecreatefromjpeg($jpgPath);
        
        $jpgWidth = imagesx($jpgImage);
        $jpgHeight = imagesy($jpgImage);
        
        //PNG Object
        $pngImage = imagecreatefrompng($pngPath);
        
        $pngWidth = imagesx($pngImage);
        $pngHeight = imagesy($pngImage);
        
        // $startX = 0;
        // $startY = imagesy($jpgImage) - $pngHeight;
        
        // imagecopy($jpgImage, $pngImage, $startX, $startY, 0, 0, $pngWidth, $pngHeight);
        imagecopy($jpgImage, $pngImage, 0, 0, 0, 0, $pngWidth, $pngHeight);
        
        // Save the merged image
        imagejpeg($jpgImage, $outputPath, 100);
    }
    

}
