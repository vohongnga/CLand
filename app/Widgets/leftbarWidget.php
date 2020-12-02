<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Model\CatModel;
use App\Model\NewsModel;
class leftbarWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    public function __construct(CatModel $catModel, NewsModel $newsModel)
    {
        $this->catModel = $catModel;
        $this->newsModel = $newsModel;
    }
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $itemRecent = $this->newsModel->recentNews();
        $itemsCat = $this->catModel->getItemsPublic();
        return view('widgets.leftbar_widget', [
            'itemRecent' => $itemRecent,
            'itemsCat'=>$itemsCat
        ]);
    }
}
