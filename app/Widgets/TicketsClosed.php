<?php

namespace App\Widgets;

use Caffeinated\Widgets\Widget;

use App\Modules\Ticket\Http\Models\Ticket;

use Cache;
use Schema;


class TicketsClosed extends Widget
{


	public function handle()
	{
		$count = $this->coountAllTickets();
		return $count;
	}


	public function coountAllTickets()
	{

		$count = trans('kotoba::general.error.no_data');

//Cache::forget('ticket_count_closed_tickets');

		if (Cache::has('ticket_count_closed_tickets')) {
			$count = Cache::get('ticket_count_closed_tickets');
		} else {
			$count = $this->getClosedTickets();
			Cache::forever('ticket_count_closed_tickets', $count);
		}

		return $count;

	}


	public function getClosedTickets()
	{

		if (Schema::hasTable('tickets')) {
			$count = 0;
			$total_tickets_closed = Ticket::IsClosed()->get();
			$count = count($total_tickets_closed);
			if ( $count == null ) {
				$count = 0;
			}
			return $count;
		}

	}


}
