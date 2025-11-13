import { Routes } from '@angular/router';
import { Dashboard } from './dashboard/dashboard';
import { Profile } from './profile/profile';
import { CreateRfq } from './create-rfq/create-rfq';
import { RfqList } from './rfq-list/rfq-list';
import { RfqDetail } from './rfq-detail/rfq-detail';
import { BidsComparison } from './bids-comparison/bids-comparison';
import { Orders } from './orders/orders';
import { Messages } from './messages/messages';
import { Notifications } from './notifications/notifications';
import { Reviews } from './reviews/reviews';
import { Invoices } from './invoices/invoices';

export const customerRoutes: Routes = [
    { path: 'dashboard', component: Dashboard },
    { path: 'profile', component: Profile },
    { path: 'create-rfq', component: CreateRfq },
    { path: 'rfqs', component: RfqList },
    { path: 'rfq/:id', component: RfqDetail },
    { path: 'rfq/:id/compare', component: BidsComparison },
    { path: 'orders', component: Orders },
    { path: 'messages', component: Messages },
    { path: 'notifications', component: Notifications },
    { path: 'reviews', component: Reviews },
    { path: 'invoices', component: Invoices }
];
