<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostFactory extends Factory
{

    public function definition(): array
    {
        $title = fake()->sentence();

        //$table->id();
        //            $table->string('title');
        //            $table->string('slug')->unique();
        //            $table->text('body');
        //            $table->timestamp('created_at')->nullable();
        //            $table->timestamp('updated_at')->nullable();
        //
        //            $table->foreignId('author_id')->constrained(
        //                table:'users', indexName:'post_user_id'

        return [

            'title' => $title,
            'slug' => Str::slug($title),
            'body' => fake()->paragraphs(3, true),
            'author_id' => User::Factory(),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}
