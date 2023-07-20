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
        // Define the RGB values for the three colors
        $colors = array(
            'rgb(12,14,221)' => array(12, 14, 221),    // Red
            'rgb(112,87,97)' => array(112, 87, 97),    // Green
            'rgb(23,76,45)' => array(23, 76, 45)     // Blue
        );
    
        // Convert the hex color code to RGB
        $inputColor = sscanf($hexColor, "%2x%2x%2x");
    
        // Calculate the distance between the input color and each predefined color
        $closestColor = null;
        $closestDistance = PHP_INT_MAX;
    
        foreach ($colors as $key => $color) {
            // Distance Formula
            $distance = sqrt(
                pow($inputColor[0] - $color[0], 2) +
                pow($inputColor[1] - $color[1], 2) +
                pow($inputColor[2] - $color[2], 2)
            );
    
            if ($distance < $closestDistance) {
                $closestColor = $key;
                $closestDistance = $distance;
            }
        }
        return $closestColor;
    }
    

    function set_background($jpgURL, $pngURL, $outputURL) {
        //JPG Background
        $jpgImg = imagecreatefromjpeg($jpgURL);
        
        $jpgWidth = imagesx($jpgImg);
        $jpgHeight = imagesy($jpgImg);
        
        //PNG Object
        $pngImg = imagecreatefrompng($pngURL);
        
        $pngWidth = imagesx($pngImg);
        $pngHeight = imagesy($pngImg);
        
        $startX = 0;
        $startY = imagesy($jpgImg) - $pngHeight;
        
        // imagecopy(GdImage $dst_image, GdImage $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $src_width, int $src_height ): bool
        imagecopy($jpgImg, $pngImg, $startX, $startY, 0, 0, $pngWidth, $pngHeight);
        
        // Save the merged image
        imagejpeg($jpgImg, $outputURL, 100);
        
    }
    

}
