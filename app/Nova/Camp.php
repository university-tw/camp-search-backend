<?php

namespace App\Nova;

use App\Nova\Filters\CampStatusType;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaItemsField\Items;

class Camp extends Resource {
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Camp>
     */
    public static $model = \App\Models\Camp::class;

    public static function label() {
        return '營隊';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request) {
        return [
            ID::make()->sortable(),
            Text::make('營隊', 'name'),

            Textarea::make('簡介', 'description'),
            Text::make('學校', 'school'),
            Text::make('系所', 'department'),
            Text::make('網址', 'url'),

            DateTime::make('開始時間', 'start'),
            DateTime::make('結束時間', 'end'),
            DateTime::make('報名截止時間', 'apply_end'),
            Text::make('報名注意事項', 'apply_notice'),
            Number::make('價格', 'price'),

            Number::make('順序', 'priority')->min(0)->max(100)->step(1)->default(0),
            Boolean::make('推薦', 'recommend'),
            Items::make('標籤', 'tags'),

            Status::make('審核狀態', 'status')
                ->resolveUsing(function ($item) {
                    return match ($item) {
                        0 => '審核中',
                        1 => '已通過',
                        2 => '未通過',
                        default => '未知',
                    };
                })
                ->loadingWhen([0, '審核中'])
                ->failedWhen([2, '未通過']),
            Select::make('審核狀態', 'status')
                ->options([
                    0 => '待審核',
                    1 => '通過',
                    2 => '拒絕',
                ])
                ->hideFromDetail()
                ->hideFromIndex(),
            Textarea::make('審核意見', 'comment')
                ->hideFromIndex(),

            HasMany::make('方案', 'offers', Offer::class),
            BelongsTo::make('建立者', 'owner', User::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request) {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request) {
        return [
            CampStatusType::make()
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request) {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request) {
        return [];
    }
}
