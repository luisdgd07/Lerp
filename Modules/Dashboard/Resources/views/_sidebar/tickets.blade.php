@widget('Activities\Feed', ['activities' => Modules\Activity\Entities\Activity::where('actionable_type',
Modules\Tickets\Entities\Ticket::class)->with('user:id,username,name')->latest()->take(50)->get(), 'view' =>
'dashboard'])
