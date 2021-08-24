<?php

namespace App\Http\Traits;

trait Tax {
    public function ret_tax($sal) {
        $gs_yr = $sal * 12;
        
        if($gs_yr < 600000) {
            $n_sal = $gs_yr/12;
        }
        else if($gs_yr > 600000 && $gs_yr <= 1200000) {
            $tax_amt = ($gs_yr - 600000) * 0.05;
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 1200000 && $gs_yr <= 1800000) {
            $tax_amt = 30000 + (($gs_yr - 1200000) * 0.1);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 1800000 && $gs_yr <= 2500000) {
            $tax_amt = 90000 + (($gs_yr - 1800000) * 0.15);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 2500000 && $gs_yr <= 3500000) {
            $tax_amt = 195000 + (($gs_yr - 2500000) * 0.175);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 3500000 && $gs_yr <= 5000000) {
            $tax_amt = 370000 + (($gs_yr - 3500000) * 0.2);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 5000000 && $gs_yr <= 8000000) {
            $tax_amt = 670000 + (($gs_yr - 5000000) * 0.225);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 8000000 && $gs_yr <= 12000000) {
            $tax_amt = 1345000 + (($gs_yr - 8000000) * 0.25);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 12000000 && $gs_yr <= 30000000) {
            $tax_amt = 2345000 + (($gs_yr - 12000000) * 0.275);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 30000000 && $gs_yr <= 50000000) {
            $tax_amt = 7295000 + (($gs_yr - 30000000) * 0.3);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 50000000 && $gs_yr <= 75000000) {
            $tax_amt = 13295000 + (($gs_yr - 50000000) * 0.325);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
        else if($gs_yr > 75000000) {
            $tax_amt = 21420000 + (($gs_yr - 75000000) * 0.35);
            $n_sal_yr = $gs_yr - $tax_amt;
            $n_sal = $n_sal_yr/12;
        }
    return $n_sal;
    }
}