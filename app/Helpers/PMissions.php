<?php
    namespace App\Helpers {

        use App\Models\PMission;

        class PMissions
        {
            private static $options = [];

            public static function getOption ( $key, $default = NULL )
            {
                if ( empty( self::$options ) )
                {
                    $options = PMission::all();

                    foreach ( $options as $option )
                    {
                        self::$options[ $option->key ] = $option->value;
                    }
                }

                return array_key_exists( $key, self::$options ) ? self::$options[ $key ] : $default;
            }
        }
    }
