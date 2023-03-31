<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Cast\Array_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'message'=> fake()->sentence(),
            'user_id' => User::where('role', '=', 'Member')->get('id')->random(),
            'post_id' => Post::get('id')->random(),
        ];
    }
}
