<?php

namespace App\Helpers;

use eftec\bladeone\BladeOne;


/**
 * BladeOneをラッパーしたViewHelper
 */
class ViewHelper
{

    /**
     * @var string viewファイルのディレクトリ
     */
    private static string $viewsDir;

    /**
     * @var string キャッシュファイルのディレクトリ
     */
    private static string $cacheDir;

    /**
     * @var int BladeOneのモード
     */
    private static int $mode;


    /**
     * @var BladeOne
     */
    private static BladeOne $viewInstance;


    /**
     * @param string $viewsDir
     */
    public static function setViewsDir(string $viewsDir)
    {
        self::$viewsDir = $viewsDir;
    }

    /**
     * @param string $cacheDir
     */
    public static function setCacheDir(string $cacheDir)
    {
        self::$cacheDir = $cacheDir;
    }

    /**
     * @param int $mode
     */
    public static function setMode(int $mode)
    {
        self::$mode = match ($mode) {
            BladeOne::MODE_AUTO, BladeOne::MODE_SLOW, BladeOne::MODE_FAST, BladeOne::MODE_DEBUG => $mode,
            default => BladeOne::MODE_DEBUG,
        };
    }

    /**
     * @return BladeOne
     */
    public static function getViewInstance(): BladeOne
    {
        if (!isset(self::$viewInstance)) {
            self::$viewInstance = new BladeOne(self::$viewsDir, self::$cacheDir, self::$mode);
        }
        return self::$viewInstance;
    }

    /**
     * @param string $template_name
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public static function render(string $template_name, array $variables = []): string
    {
        return self::getViewInstance()->run($template_name, $variables);
    }
}