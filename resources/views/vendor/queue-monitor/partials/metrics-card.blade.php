<div class="col-md-4 mb-3">

    <div class="h-full flex flex-col justify-between p-6 bg-white rounded shadow-md">

        <div class="font-semibold text-sm text-gray-600"
             title="{{ __('Last :days days', ['days' => config('queue-monitor.ui.metrics_time_frame') ?? 14]) }}">
            {{ __($metric->title) }}
        </div>

        <div class="d-flex align-items-center">

            <div class="mt-2 text-3xl me-3">
                {{ $metric->format($metric->value) }}
            </div>

            @if($metric->previousValue !== null)
                <div class="mt-2 text-sm font-semibold {{ $metric->hasChanged() ? ($metric->hasIncreased() ? 'text-green-700' : 'text-red-800') : 'text-gray-800' }}">

                    @if($metric->hasChanged())
                        @if($metric->hasIncreased())
                            @lang('Up from')
                        @else
                            @lang('Down from')
                        @endif
                    @else
                        @lang('No change from')
                    @endif

                    {{ $metric->format($metric->previousValue) }}
                </div>

            @endif

        </div>

    </div>

</div>
