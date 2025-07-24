<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $order;
 */
class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function moveUp(): void
    {
        $this->move(-1);
    }
    public function moveDown(): void
    {
        $this->move(1);
    }

    /**
     * Function responsible for reorder the link
     *
     * @param int $to +1 for moving down or -1 for moving up
     * @return void
     */
    private function move(int $to): void
    {
        $order = $this->order;
        $newOrder = $order + $to;

        $swapWith = $this->user->links()->where('order', $newOrder)->first();

        $this->update(['order' => $newOrder]);
        $swapWith->update(['order' => $order]);
    }
}
