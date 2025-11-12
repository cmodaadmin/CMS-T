import { Routes } from '@angular/router';
import { Home } from './pages/home/home';
import { About } from './pages/about/about';
import { Contact } from './pages/contact/contact';
import { HowItWorks } from './pages/how-it-works/how-it-works';
import { Categories } from './pages/categories/categories';
import { Pricing } from './pages/pricing/pricing';
import { Faq } from './pages/faq/faq';
import { VendorDirectory } from './pages/vendor-directory/vendor-directory';
import { VendorPortfolio } from './pages/vendor-portfolio/vendor-portfolio';
import { AuthEntry } from './pages/auth-entry/auth-entry';

export const routes: Routes = [
    { path: '', component: Home },
    { path: 'about', component: About },
    { path: 'contact', component: Contact },
    { path: 'how-it-works', component: HowItWorks },
    { path: 'categories', component: Categories },
    { path: 'pricing', component: Pricing },
    { path: 'faq', component: Faq },
    { path: 'vendors', component: VendorDirectory },
    { path: 'vendor/:id', component: VendorPortfolio },
    { path: 'auth', component: AuthEntry },
    {
        path: 'customer',
        loadChildren: () => import('./customer/customer.routes').then(m => m.customerRoutes)
    },
    {
        path: 'vendor',
        loadChildren: () => import('./vendor/vendor.routes').then(m => m.vendorRoutes)
    },
    {
        path: 'admin',
        loadChildren: () => import('./admin/admin.routes').then(m => m.adminRoutes)
    }
];
