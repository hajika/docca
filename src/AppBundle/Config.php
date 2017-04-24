<?php

namespace AppBundle;

class Config {
    
    const FILE_UPLOAD_PATH = '../web/uploads/';
    
    const FILE_THUMB_PATH = '../web/images/thumbs/';
    const FILE_THUMB_SCALE_COLS = 70;
    const FILE_THUMB_SCALE_ROWS = 0;
    const FILE_THUMB_CROP_WIDTH = 70;
    const FILE_THUMB_CROP_HEIGHT = 95;
    const FILE_THUMB_CROP_X = 0;
    const FILE_THUMB_CROP_Y = 0;
    
    const FILE_PREVIEW_PATH = '../web/images/previews/';
    const FILE_PREVIEW_SCALE_COLS = 600;
    const FILE_PREVIEW_SCALE_ROWS = 0;
}
