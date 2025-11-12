import { Routes } from '@angular/router';
import { HomeComponent } from './pages/home/home';
import { AboutComponent } from './pages/about/about';
import { ContactComponent } from './pages/contact/contact';
import { HowItWorksComponent } from './pages/how-it-works/how-it-works';
import { CategoriesComponent } from './pages/categories/categories';
import { PricingComponent } from './pages/pricing/pricing';
import { FaqComponent } from './pages/faq/faq';
import { VendorDirectoryComponent } from './pages/vendor-directory/vendor-directory';
import { VendorPortfolioComponent } from './pages/vendor-portfolio/vendor-portfolio';
import { AuthEntryComponent } from './pages/auth-entry/auth-entry';

export const routes: Routes = [
    { path: '', component: HomeComponent },
    { path: 'about', component: AboutComponent },
    { path: 'contact', component: ContactComponent },
    { path: 'how-it-works', component: HowItWorksComponent },
    { path: 'categories', component: CategoriesComponent },
    { path: 'pricing', component: PricingComponent },
    { path: 'faq', component: FaqComponent },
    { path: 'vendors', component: VendorDirectoryComponent },
    { path: 'vendor/:id', component: VendorPortfolioComponent },
    { path: 'auth', component: AuthEntryComponent },
    {
        path: 'customer',
        loadChildren: () => import('./customer/customer.routes').then(m => m.customerRoutes)
    },
    {
        path: 'vendor',
        loadChildren: () => import('./vendor/vendor.routes').then(m => m.vendorRoutes)
    }
];
