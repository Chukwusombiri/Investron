export const optionsResource = {
    assetOptions: [
        {
            id: 1,
            label: '$1 thousand - $100 thousand',
            value: '$1 thousand - $100 thousand',
        },
        {
            id: 2,
            label: '$100 thousand - $1 million',
            value: '$100 thousand - $1 million',
        },
        {
            id: 3,
            label: '$1 million - $5 million',
            value: '$1 million - $5 million',
        },
        {
            id: 4,
            label: '$5 million - $25 million',
            value: '$5 million - $25 million',
        },
        {
            id: 5,
            label: '$25 million - $50 million',
            value: '$25 million - $50 million',
        },
        {
            id: 6,
            label: '$50 million +',
            value: '$50 million +',
        },
    ],

    demandOptions: {
        wealthManagement: {
            title: 'Wealth Management',
            options: [
                {
                    id: 1,
                    label: 'Investment management',
                    value: 'Investment management',
                },
                {
                    id: 2,
                    label: 'Retirement Planning',
                    value: 'Retirement Planning',
                },
                {
                    id: 3,
                    label: 'Estate & Wealth Transfer Planning',
                    value: 'Estate & Wealth Transfer Planning',
                },
                {
                    id: 4,
                    label: 'Philanthropy',
                    value: 'Philanthropy',
                },
                {
                    id: 5,
                    label: 'Risk Management',
                    value: 'Risk Management',
                },
                {
                    id: 6,
                    label: 'Education Planning',
                    value: 'Education Planning',
                },
                {
                    id: 7,
                    label: 'Alternative Investments',
                    value: 'Alternative Investments',
                },
                {
                    id: 8,
                    label: 'Tax Planning',
                    value: 'Tax Planning',
                },
            ]

        },
        familyOfficeSolution: {
            title: 'Family Office Solutions',
            options: [
                {
                    id: 1,
                    label: 'Tax Planning & Compliance',
                    value: 'Tax Planning & Compliance'
                },
                {
                    id: 2,
                    label: 'Trust Services',
                    value: 'Trust Services'
                },
                {
                    id: 3,
                    label: 'Wealth Transfer Planning',
                    value: 'Wealth Transfer Planning'
                },
                {
                    id: 4,
                    label: 'Values Aligned Investing',
                    value: 'Values Aligned Investing'
                },
                {
                    id: 5,
                    label: 'Personal CFO Services',
                    value: 'Personal CFO Services'
                },
                {
                    id: 6,
                    label: 'Concierge Services',
                    value: 'Concierge Services'
                },
            ]
        },
        others: {
            title: 'Other',
            options: [
                {
                    id: 1,
                    label: 'General Inquiries',
                    value: 'General Inquiries'
                }
            ]
        }
    }
}

export const locationResource = [
    {
        state: 'Arizona',
        img: 'Phoenix.png',
        offices: [
            {
                city: 'Phoenix',
                address: [
                    {
                        line: '2415 E Camelback Road Suite 700',
                        zip: 'Phoenix, AZ 85016',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'California',
        img: 'San_Francisco.png',
        offices: [
            {
                city: 'Los Angeles',
                address: [
                    {
                        line: '1880 Century Park E Suite 1020',
                        zip: 'Los Angeles, CA 90067',                        
                    }
                ]
            },
            {
                city: 'Menlo Park',
                address: [
                    {
                        line: '1550 El Camino Real Suite 200',
                        zip: 'Menlo Park, CA 94025',                        
                    }
                ]
            },
            {
                city: 'Newport Beach',
                address: [
                    {
                        line: '500 Newport Center Drive Suite 700',
                        zip: 'Newport Beach, CA 92660',                        
                    }
                ]
            },
            {
                city: 'San Diego',
                address: [
                    {
                        line: '12265 El Camino Real Suite 300',
                        zip: 'San Diego, CA 92130',                        
                    }
                ]
            },
            {
                city: 'San Francisco',
                address: [
                    {
                        line: '600 Montgomery Street Suite 3900',
                        zip: 'San Francisco, CA 94111',                        
                    },
                    {
                        line: '555 Mission Street Suite 3325',
                        zip: 'San Francisco, CA 94105',                        
                    }
                ]
            },

        ]
    },
    {
        state: 'Colorado',
        img: 'Denver.png',
        offices: [
            {
                city: 'Denver',
                address: [
                    {
                        line: '250 Fillmore Street Suite 150',
                        zip: 'Denver, CO 80206',                        
                    },
                    {
                        line: '200 Clayton Street Suite 300',
                        zip: 'Denver, CO 80206',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Florida',
        img: 'Miami.png',
        offices: [
            {
                city: 'Fort Lauderdale',
                address: [
                    {
                        line: '200 E Las Olas Blvd Suite 1550',
                        zip: 'Fort Lauderdale, FL 33301',                        
                    },
                ]
            },
            {
                city: 'Miami',
                address: [
                    {
                        line: '2 S Biscayne Boulevard Suite 3200 ',
                        zip: 'Miami, FL 33131',                        
                    },
                ]
            },
            {
                city: 'Naples',
                address: [
                    {
                        line: '1415 Panther Lane Suite 142',
                        zip: 'Naples, FL 34109',                        
                    },
                ]
            },
            {
                city: 'St. Petersburg',
                address: [
                    {
                        line: '100 Second Ave S Suite 701',
                        zip: 'St. Petersburg, FL 33701',                        
                    },
                ]
            },
            {
                city: 'Weston',
                address: [
                    {
                        line: '2700 S Commerce Parkway Suite 100',
                        zip: 'Weston, FL 33331',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Georgia',
        img: 'Georgia.png',
        offices: [
            {
                city: 'Atlanta',
                address: [
                    {
                        line: '3344 Peachtree Road NE Suite 2000',
                        zip: 'Atlanta, GA 30326',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Illinois',
        img: 'Chicago.png',
        offices: [
            {
                city: 'Chicago',
                address: [
                    {
                        line: '10 S Wacker Drive Suite 3100',
                        zip: 'Chicago, IL 60606',                        
                    },
                ]
            },
            {
                city: 'Itasca',
                address: [
                    {
                        line: '2 Pierce Place Suite 1900',
                        zip: 'Itasca, IL 60143',                        
                    },
                ]
            }
        ]
    },  
    {
        state: 'Indiana',
        img: 'Indianapolis.png',
        offices: [
            {
                city: 'Indianapolis',
                address: [
                    {
                        line: '500 E 96th Street Suite 450',
                        zip: 'Indianapolis, IN 46240',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Massachusetts',
        img: 'Boston.png',
        offices: [
            {
                city: 'Boston',
                address: [
                    {
                        line: '1 Post Office Square Suite 2400',
                        zip: 'Boston, MA 02109',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Michigan',
        img: 'Michigan.png',
        offices: [
            {
                city: 'Birmingham',
                address: [
                    {
                        line: '260 E Brown Street Suite 100',
                        zip: 'Birmingham, MI 48009',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Missouri',
        img: 'Missouri.png',
        offices: [
            {
                city: 'Chesterfield',
                address: [
                    {
                        line: '14755 N Outer Forty Suite 208',
                        zip: 'Chesterfield, Missouri 63017',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'New jersey',
        img: 'Morristown.png',
        offices: [
            {
                city: 'Morristown',
                address: [
                    {
                        line: '60 Columbia Road Building A Suite 300',
                        zip: 'Morristown, NJ 07960',                        
                    },
                ]
            },
        ]
    },  
    {
        state: 'New York',
        img: 'New_York_City.png',
        offices: [
            {
                city: 'Garden City',
                address: [
                    {
                        line: '1050 Franklin Ave Suite 400',
                        zip: 'Garden City, NY 11530',                        
                    },
                ]
            },
            {
                city: 'New York City',
                address: [
                    {
                        line: '101 Park Avenue Suite 3100',
                        zip: 'New York, NY 10178',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'North Carolina',
        img: 'North_Carolina.png',
        offices: [
            {
                city: 'Charlotte',
                address: [
                    {
                        line: '4201 Congress Street Suite 240',
                        zip: 'Charlotte, NC 28209',                        
                    },
                    {
                        line: '6100 Fairview Road Suite 1150',
                        zip: 'Charlotte, NC 28210',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Ohio',
        img: 'Ohio.png',
        offices: [
            {
                city: 'Cincinnati',
                address: [
                    {
                        line: '4030 Smith Road Suite 140',
                        zip: 'Cincinnati, OH 45209',                        
                    },
                ]
            },
            {
                city: 'Columbus',
                address: [
                    {
                        line: '1801 Watermark Drive Suite 300',
                        zip: 'Columbus, OH 43215',                        
                    },
                ]
            },
            {
                city: 'Shaker Heights',
                address: [
                    {
                        line: '3401 Tuttle Road Suite 290',
                        zip: 'Shaker Heights, OH 44122',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Pennsylvania',
        img: 'Pennsylvania.png',
        offices: [
            {
                city: 'Ardmore',
                address: [
                    {
                        line: '32 Parking Plaza Suite 700',
                        zip: 'Ardmore, PA 19003 ',                        
                    },
                ]
            },
            {
                city: 'Sewickley',
                address: [
                    {
                        line: '2605 Nicholson Road Suite 5140',
                        zip: 'Sewickley, PA 15143 ',                        
                    },
                ]
            },
            {
                city: 'Wayne',
                address: [
                    {
                        line: '485 Devon Park Drive Suite 119',
                        zip: 'Wayne, PA 19087',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Texas',
        img: 'Texas.png',
        offices: [
            {
                city: 'Dallas',
                address: [
                    {
                        line: '5950 Sherry Lane Suite 600',
                        zip:  'Dallas, TX 75225',                        
                    },
                ]
            },
            {
                city: 'Houston',
                address: [
                    {
                        line: '2929 Allen Parkway Suite 3000',
                        zip:  'Houston, TX 77019',                        
                    },
                    {
                        line: '1330 Post Oak Boulevard Suite 2190',
                        zip:  'Houston, TX 77056',                        
                    }
                ]
            },
            {
                city: 'San Antonio',
                address: [
                    {
                        line: '112 E Pecan Street Suite 525',
                        zip:  'San Antonio, TX 78205',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Utah',
        img: 'Utah_SaltLakeCity.png',
        offices: [
            {
                city: 'Salt Lake City',
                address: [
                    {
                        line: '132 S State St Suite 308',
                        zip: 'Salt Lake City, UT 84111',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Virginia',
        img: 'Virginia.png',
        offices: [
            {
                city: 'McLean',
                address: [
                    {
                        line: '1640 Boro Place 4th Floor',
                        zip: 'McLean, VA 22102',                        
                    },
                ]
            },
        ]
    },
    {
        state: 'Washington',
        img: 'Seattle.png',
        offices: [
            {
                city: 'Seattle',
                address: [
                    {
                        line: '1910 Fairview Ave E Suite 200',
                        zip: 'Seattle, WA 98102',                        
                    },
                    {
                        line: '925 Fourth Ave Suite 2288',
                        zip: 'Seattle, WA 98104',                        
                    }
                ]
            },
        ]
    },
]
