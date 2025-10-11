<?php

namespace App\Enums;

enum ClientDemand :string
{
    CASE INVESTMENT = 'Investment management';
    CASE RETIREMENT = 'Retirement Planning';
    CASE ESTATEANDWEALTHTRANSFER = 'Estate & Wealth Transfer Planning';
    CASE PHILANTHROPY = 'Philanthropy';
    CASE RISKMANAGEMENT = 'Risk Management';
    CASE EDUCATION = 'Education Planning';
    CASE ALTERNATIVE = 'Alternative Investments';
    CASE TAXPLANNING = 'Tax Planning';
    CASE TAXPLANNINGANDCOMPLIANCE = 'Tax Planning & Compliance';
    CASE TRUSTSERVICE = 'Trust Services';
    CASE WEALTHTRANSFER = 'Wealth Transfer Planning';
    CASE VALUEALIGNED = 'Values Aligned Investing';
    CASE PERSONALCFO = 'Personal CFO Services';
    CASE CONCIERGE = 'Concierge Services';
    CASE GENERAL = 'General Inquiries';
}