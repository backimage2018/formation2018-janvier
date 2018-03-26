<?php
namespace App\Controller;

class Data
{

    /* data for header - start */
    /* data for top bar - start */
    const welcome = [
        "message" => "Welcome to e-shop"
    ];

    const moneys = [
        "default" => "USD ($)",
        "list" => [
            "money0" => "USD ($)",
            "money1" => "EUR (€)"
        ]
    ];

    /* data for top bar - end */
    /* data for title bar - start */
    const searchcategories = [
        "cat" => [
            "All categories",
            "Category 1",
            "Catgory 2"
        ]
    ];

    const cart = [
        [
            "title" => "My cart",
            "qty" => "3",
            "amount" => "$65.35",
            "viewbutton" => "View cart",
            "checkoutbutton" => "Checkout",
            "content" => [
                "article0" => [
                    "price" => "$31.50",
                    "name" => "Sac à main tissu",
                    "url" => "./img/product01.jpg",
                    "qty" => "1"
                ],
                "article1" => [
                    "price" => "$42.50",
                    "name" => "Montre kikou",
                    "url" => "./img/product02.jpg",
                    "qty" => "2"
                ],
                "article2" => [
                    "price" => "$32.50",
                    "name" => "Portefeuille cuir",
                    "url" => "./img/product03.jpg",
                    "qty" => "3"
                ]
            
            ]
        ]
    ];

    /* data for title bar - start */
    /* data for the menu bar- start */
    /* data for the menu bar- start */
    
    /* custom data for index page - start */
    const smallbanners = [
        "banner0" => [
            "title" => "NEW COLLECTION",
            "url" => "./img/banner10.jpg"
        ],
        "banner1" => [
            "title" => "NEW COLLECTION",
            "url" => "./img/banner11.jpg"
        ],
        "banner2" => [
            "title" => "NEW COLLECTION",
            "url" => "./img/banner12.jpg"
        ]
    ];

    const dealsoftheday = [
        "article0" => [
            "price" => "$40.50",
            "name" => "Sac à main tissu",
            "url" => "./img/product01.jpg",
            "sale" => "-10%",
            "oldprice" => "$45.00",
            "countdown" => [
                "h" => "23",
                "m" => "21",
                "s" => "19"
            ]
        ],
        "article1" => [
            "price" => "$32.50",
            "name" => "Montre matuvu, design soigné",
            "url" => "./img/product02.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00",
            "countdown" => [
                "h" => "23",
                "m" => "21",
                "s" => "19"
            ]
        ],
        "article2" => [
            "price" => "$32.50",
            "name" => "Portefeuille simili cuir gris",
            "url" => "./img/product03.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00",
            "countdown" => [
                "h" => "23",
                "m" => "21",
                "s" => "19"
            ]
        ],
        "article3" => [
            "price" => "$32.50",
            "name" => "Portefeuille simili cuir gris",
            "url" => "./img/product03.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00",
            "countdown" => [
                "h" => "23",
                "m" => "21",
                "s" => "19"
            ]
        ]
    ];

    const categories = [
        "title" => "categories",
        "list" => [
            "0" => [
                "href" => "/products/category/clothing/women",
                "text" => "women's clothing"
            ],
            "1" => [
                "href" => "/products/category/clothing/men",
                "text" => "men's clothing"
            ],
            "2" => [
                "href" => "/products/category/phones_and_accessories",
                "text" => "Phone's & accessories"
            ],
            "3" => [
                "href" => "/products/category/computer_and_office",
                "text" => "Computer & office"
            ],
            "4" => [
                "href" => "/products/category/consumer_electronics",
                "text" => "Consumer Electronics"
            ],
            "5" => [
                "href" => "/products/category/jewelry_and_watches",
                "text" => "Jewelry & watches"
            ],
            "6" => [
                "href" => "/products/category/bags_and_shoes",
                "text" => "Bags & shoes"
            ],
            "7" => [
                "href" => "/products/all",
                "text" => "view all"
            ]
        ]
    ];

    const blackmenu = [
        "list" => [
            "0" => [
                "href" => "/",
                "text" => "Home"
            ],
            "1" => [
                "href" => "/product/all",
                "text" => "Shop"
            ],
            "2" => [
                "href" => "/product/all",
                "text" => "Men's"
            ],
            "3" => [
                "href" => "/product/all",
                "text" => "Women's",
                // TODO adapt url product >> product / {id }
                "categories" => [
                    "url" => "/product",
                    "text" => "Clothing"
                ]
            ]
        ]
    ];

    const allarticles = [
        "article0" => [
            "price" => "$42.50",
            "name" => "Sac à main tissu",
            "url" => "./img/product01.jpg"
        ],
        "article1" => [
            "price" => "$32.50",
            "name" => "Montre matuvu, design soigné",
            "url" => "./img/product02.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00"
        ],
        "article2" => [
            "price" => "$32.50",
            "name" => "Portefeuille simili cuir gris",
            "url" => "./img/product03.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00"
        ],
        "article3" => [
            "price" => "$52.50",
            "name" => "Basket tissu bleu",
            "url" => "./img/product04.jpg",
            "new" => "new"
        ]
    ];

    const latestarticles = [
        "article0" => [
            "price" => "$42.50",
            "name" => "Sac à main tissu",
            "url" => "./img/product01.jpg"
        ],
        "article1" => [
            "price" => "$32.50",
            "name" => "Montre matuvu, design soigné",
            "url" => "./img/product02.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00"
        ],
        "article2" => [
            "price" => "$32.50",
            "name" => "Portefeuille simili cuir gris",
            "url" => "./img/product03.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00"
        ],
        "article3" => [
            "price" => "$52.50",
            "name" => "Basket tissu bleu",
            "url" => "./img/product04.jpg",
            "new" => "new"
        ]
    ];

    const newcollectionarticles = [
        "article0" => [
            "price" => "$130.50",
            "name" => "Cas dame cuir noir",
            "url" => "./img/product05.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$170.00"
        ],
        "article1" => [
            "price" => "$70",
            "name" => "Sacoche daim homme",
            "url" => "./img/product06.jpg",
            "new" => "new",
            "sale" => "-30%",
            "oldprice" => "$100"
        ],
        "article2" => [
            "price" => "$100.00",
            "name" => "Bottes dames noires",
            "url" => "./img/product07.jpg",
            "notation" => 2,
            "new" => "new",
            "sale" => "-50%",
            "oldprice" => "$200.00"
        ],
        "article3" => [
            "price" => "$42.50",
            "name" => "Sac à main tissu",
            "url" => "./img/product01.jpg"
        ],
        "article4" => [
            "price" => "$32.50",
            "name" => "Montre matuvu, design soigné",
            "url" => "./img/product02.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00"
        ],
        "article5" => [
            "price" => "$32.50",
            "name" => "Portefeuille simili cuir gris",
            "url" => "./img/product03.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00"
        ],
        "article6" => [
            "price" => "$52.50",
            "name" => "Basket tissu bleu",
            "url" => "./img/product04.jpg",
            "new" => "new"
        ]
    ];

    const pickedarticles = [
        "article0" => [
            "price" => "$42.50",
            "name" => "Sac à main tissu",
            "url" => "./img/product01.jpg"
        ],
        "article1" => [
            "price" => "$32.50",
            "name" => "Montre matuvu, design soigné",
            "url" => "./img/product02.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00"
        ],
        "article2" => [
            "price" => "$32.50",
            "name" => "Portefeuille simili cuir gris",
            "url" => "./img/product03.jpg",
            "new" => "new",
            "sale" => "-20%",
            "oldprice" => "$45.00"
        ],
        "article3" => [
            "price" => "$52.50",
            "name" => "Basket tissu bleu",
            "url" => "./img/product04.jpg",
            "new" => "new"
        ]
    ];

    /* custom data for index page - end */
    const langages = [
        "default" => "ENG",
        "list" => [
            "lang0" => [
                "url" => "#",
                "title" => "English",
                "code" => "ENG"
            ],
            "lang1" => [
                "url" => "#",
                "title" => "French",
                "code" => "FR"
            ]
        ]
    ];

    /* custom data for faq page - start */
    const faqs = [
        "faq1" => [
            "q" => "Que faire ?",
            "a" => "Ne rien faire c'est bien"
        ],
        "faq2" => [
            "q" => "Comment faire ?",
            "a" => "Du mieux possible"
        ],
        "faq3" => [
            "q" => "Quoi faire ?",
            "a" => "Aider c'est bien aussi"
        ]
    ];

    /* custom data for faq page - end */
    
    /* custom data for about page - start */
    const about = [
        "title" => "A propos de nous",
        "message" => "Voici tout ce que l'on peut dire à propos de nous"
    ];

    /* custom data for about page - end */
    
    /* data for footer - start */
    const socialnetworks = [
        "net0" => [
            "url" => "http://www.facebook.com",
            "icon" => "fa-facebook"
        ],
        "net1" => [
            "url" => "http://www.twitter.com",
            "icon" => "fa-twitter"
        ],
        "net2" => [
            "url" => "http://www.instagram.com",
            "icon" => "fa-instagram"
        ],
        "net3" => [
            "url" => "http://www.pinterest.com",
            "icon" => "fa-pinterest"
        ],
        "net4" => [
            "url" => "http://www.google.com",
            "icon" => "fa-google-plus"
        ]
    ];

    const myaccount = [
        "title" => "MY ACCOUNT",
        "accounts" => [
            "account0" => [
                "url" => "/profile",
                "title" => "MY ACCOUNT",
                "icon" => "fa-user-o"
            ],
            "account1" => [
                "url" => "/whishlist",
                "title" => "MY WHISHLIST",
                "icon" => "fa-heart-o"
            ],
            "account2" => [
                "url" => "/compare",
                "title" => "COMPARE",
                "icon" => "fa-exchange"
            ],
            "account3" => [
                "url" => "/checkout",
                "title" => "CHECKOUT",
                "icon" => "fa-check"
            ],
            "account4" => [
                "url" => "/login",
                "title" => "LOGIN",
                "icon" => "fa-unlock-alt"
            ],
            "account5" => [
                "url" => "/logout",
                "title" => "LOGOUT",
                "icon" => "fa-unlock-alt"
            ],
            "account6" => [
                "url" => "/signin",
                "title" => "Create an account",
                "icon" => "fa-user-plus"
            ]
        ]
    ];

    const services = [
        "title" => "Customer Service",
        "services" => [
            "service0" => [
                "url" => "/about",
                "title" => "ABOUT US"
            ],
            "service1" => [
                "url" => "/shiping_and_return",
                "title" => "SHIPING & RETURN"
            ],
            "service2" => [
                "url" => "/shiping_guide",
                "title" => "SHIPING GUIDE"
            ],
            "service3" => [
                "url" => "/faq",
                "title" => "FAQ"
            ]
        ]
    ];

    const stayconnected = [
        "calltoaction" => "Newsletter",
        "title" => "Stay connected",
        "message" => "Abonnez-vous à notre newsletter et restez au courant des dernières nouveautés !",
        "button" => "S'abonner à la newsletter",
        "placeholder" => "Enter Email Address"
    ];

    const logo = [
        "urlsrc" => "./img/logo.png",
        "urlhref" => "/",
        "alt" => "Logo"
    ];

    /* data for footer - end */
    public static function loadHeader($param)
    {
        /* all displayed data in header */
        $param["categories"] = self::categories; // mandatory
        $param["blackmenu"] = self::blackmenu; // mandatory
        $param["searchcategories"] = self::searchcategories; // mandatory
        $param["cart"] = self::cart; // mandatory
        $param["langages"] = self::langages; // mandatory
        $param["welcome"] = self::welcome; // mandatory
        $param["moneys"] = self::moneys; // mandatory
        
        return $param;
    }

    public static function loadFooter($param)
    {
        /* all displayed data in footer */
        $param["logo"] = self::logo;
        $param["socialnetworks"] = self::socialnetworks;
        $param["services"] = self::services;
        $param["myaccount"] = self::myaccount;
        $param["stayconnected"] = self::stayconnected;
        return $param;
    }
    
    // public static function generateProduct($product)
    // {
    // $product["price"] = "$31.50";
    // $product["name"] = "Sac à main tissu";
    // $product["url"] = "./img/product01.jpg";
    // return $product;
    // }
    
    // public static function generateCountdown($product)
    // {
    // $product["countdown"] = [
    // "h" => "23",
    // "m" => "21",
    // "s" => "19"
    // ];
    // return $product;
    // }
    
    // public static function generateNew($product)
    // {
    // $product["new"] = "new";
    // return $product;
    // }
    
    // public static function generateDiscount($product)
    // {
    // $product["sale"] = "-20%";
    // $product["oldprice"] = "$45.00";
    // }
}
?>