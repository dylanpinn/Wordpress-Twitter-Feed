<?php

/*
  Plugin Name: Twitter Tweets Widget
  Plugin URI: http://arcadiandigital.com.au
  Description: Displays latest tweets from Twitter.
  Author: Dylan Pinn
  Author URI: http://dylanpinn.com
 */

class Twitter_Tweets_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'twitter-tweets-widget',
            __('Twitter Tweets Widget', 'twitter_tweets_widget'),
            array(
                'description' => __('Displays latest tweets from Twitter.', 'twitter_tweets_widget')
            )
        );
    }

    public function form($instance)
    {
        if (empty($instance)) {
            $twitter_username = '';
            $update_count = '';
            $oauth_access_token = '';
            $oauth_access_token_secret = '';
            $consumer_key = '';
            $consumer_secret = '';
            $title = '';
        } else {
            $twitter_username = $instance['twitter_username'];
            $update_count = isset($instance['update_count']) ? $instance['update_count'] : 5;
            $oauth_access_token = $instance['oauth_access_token'];
            $oauth_access_token_secret = $instance['oauth_access_token_secret'];
            $consumer_key = $instance['consumer_key'];
            $consumer_secret = $instance['consumer_secret'];

            if (isset($instance['title'])) {
                $title = $instance['title'];
            } else {
                $title = __('Twitter feed', 'twitter_tweets_feed');
            }
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php echo __('Title', 'twitter_tweets_widget') . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_username'); ?>">
                <?php echo __('Twitter Username (without @)', 'twitter_tweets_widget') . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_username'); ?>"
                   name="<?php echo $this->get_field_name('twitter_username'); ?>" type="text"
                   value="<?php echo esc_attr($twitter_username); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('update_count'); ?>">
                <?php echo __('Number of Tweets to Display', 'twitter_tweets_widget') . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('update_count'); ?>"
                   name="<?php echo $this->get_field_name('update_count'); ?>" type="number"
                   value="<?php echo esc_attr($update_count); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('oauth_access_token'); ?>">
                <?php echo __('OAuth Access Token', 'twitter_tweets_widget') . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('oauth_access_token'); ?>"
                   name="<?php echo $this->get_field_name('oauth_access_token'); ?>" type="text"
                   value="<?php echo esc_attr($oauth_access_token); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('oauth_access_token_secret'); ?>">
                <?php echo __('OAuth Access Token Secret', 'twitter_tweets_widget') . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('oauth_access_token_secret'); ?>"
                   name="<?php echo $this->get_field_name('oauth_access_token_secret'); ?>" type="text"
                   value="<?php echo esc_attr($oauth_access_token_secret); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('consumer_key'); ?>">
                <?php echo __('Consumer Key', 'twitter_tweets_widget') . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('consumer_key'); ?>"
                   name="<?php echo $this->get_field_name('consumer_key'); ?>" type="text"
                   value="<?php echo esc_attr($consumer_key); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('consumer_secret'); ?>">
                <?php echo __('Consumer Secret', 'twitter_tweets_widget') . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('consumer_secret'); ?>"
                   name="<?php echo $this->get_field_name('consumer_secret'); ?>" type="text"
                   value="<?php echo esc_attr($consumer_secret); ?>"/>
        </p>

        <?php
    }
}
