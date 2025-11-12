import { Routes } from '@angular/router';
import { VendorDashboardComponent } from './dashboard/dashboard';
import { VendorProfileComponent } from './profile/profile';
import { VendorSubscriptionComponent } from './subscription/subscription';
import { VendorPortfolioComponent } from './portfolio/portfolio';
import { VendorRfqsBrowserComponent } from './rfqs-browser/rfqs-browser';
import { VendorRfqDetailComponent } from './rfq-detail/rfq-detail';
import { VendorBidsManagementComponent } from './bids-management/bids-management';
import { VendorOrdersComponent } from './orders/orders';
import { VendorMessagesComponent } from './messages/messages';
import { VendorNotificationsComponent } from './notifications/notifications';
import { VendorEarningsComponent } from './earnings/earnings';

export const vendorRoutes: Routes = [
    { path: 'dashboard', component: VendorDashboardComponent },
    { path: 'profile', component: VendorProfileComponent },
    { path: 'subscription', component: VendorSubscriptionComponent },
    { path: 'portfolio', component: VendorPortfolioComponent },
    { path: 'rfqs', component: VendorRfqsBrowserComponent },
    { path: 'rfq/:id', component: VendorRfqDetailComponent },
    { path: 'bids', component: VendorBidsManagementComponent },
    { path: 'orders', component: VendorOrdersComponent },
    { path: 'messages', component: VendorMessagesComponent },
    { path: 'notifications', component: VendorNotificationsComponent },
    { path: 'earnings', component: VendorEarningsComponent }
];
