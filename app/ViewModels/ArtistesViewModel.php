<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ArtistesViewModel extends ViewModel
{
    public $populaires;
    public $page;

    public function __construct($populaires, $page)
    {
        $this->populaires = $populaires;
        $this->page = $page;
    }

    public function populaires() 
    {
        return collect($this->populaires)->map(function ($artiste) {
            
            return collect($artiste)->merge([
                'profile_path' => $artiste['profile_path'] ? 
                    'https://image.tmdb.org/t/p/w235_and_h235_face'.$artiste['profile_path'] : 
                    'https://ui-avatars.com/api?size=235&name='.$artiste['name'],
                'known_for' => collect($artiste['known_for'])->where('media_type', 'movie')->pluck('title')->union(
                    collect($artiste['known_for'])->where('media_type', 'tv')->pluck('name')
                )->implode(', '),
            ])->only(
                'profile_path', 'name', 'known_for', 'id'
            );
        });
    }

    public function previous()
    {
        return $this->page > 1 ? $this->page - 1 : null;
    }

    public function next()
    {
        return $this->page < 500 ? $this->page + 1 : null;
    }
}
