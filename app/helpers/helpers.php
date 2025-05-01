<?php

use App\Models\SocialMedia;

function checkServiceUrl(){
    $currentRouteName = Route::currentRouteName();
    if($currentRouteName=='Admin.Insurance-partner-detail'
     ||$currentRouteName=='Admin.customer-right-info-detail'
     ||$currentRouteName=='Admin.customer-rate-info-detail'

      ||$currentRouteName=='Admin.customer-video-detail'
      ||$currentRouteName=='Admin.Topics'
      ||$currentRouteName=='Admin.eye-health-video'
      ||$currentRouteName=='Admin.eye-health-detail'


      ||$currentRouteName=='Admin.rights.index'
      ||$currentRouteName=='Admin.videos.index'
      ||$currentRouteName=='Admin.rates.index'
      ||$currentRouteName=='Admin.partners.index'
      ||$currentRouteName=='Admin.articles.index'
      ||$currentRouteName=='Admin.partners.create'
      ||$currentRouteName=='Admin.partners.show'
      ||$currentRouteName=='Admin.articles.create'
      ||$currentRouteName=='Admin.articles.show'


     ){
        return true;
     }

     return false;
}


function media(){
     return SocialMedia::get();
}