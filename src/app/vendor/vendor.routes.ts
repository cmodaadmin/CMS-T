import { Routes } from '@angular/router';
import { Dashboard } from './dashboard/dashboard';
import { Profile } from './profile/profile';
import { Subscription } from './subscription/subscription';
import { Portfolio } from './portfolio/portfolio';
import { RfqsBrowser } from './rfqs-browser/rfqs-browser';
import { RfqDetail } from './rfq-detail/rfq-detail';
import { BidsManagement } from './bids-management/bids-management';
import { Orders } from './orders/orders';
import { Messages } from './messages/messages';
import { Notifications } from './notifications/notifications';
import { Earnings } from './earnings/earnings';

export const vendorRoutes: Routes = [
    { path: 'dashboard', component: Dashboard },
    { path: 'profile', component: Profile },
    { path: 'subscription', component: Subscription },
    { path: 'portfolio', component: Portfolio },
    { path: 'rfqs', component: RfqsBrowser },
    { path: 'rfq/:id', component: RfqDetail },
    { path: 'bids', component: BidsManagement },
    { path: 'orders', component: Orders },
    { path: 'messages', component: Messages },
    { path: 'notifications', component: Notifications },
    { path: 'earnings', component: Earnings }
];
