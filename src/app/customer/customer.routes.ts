import { Routes } from '@angular/router';
import { CustomerDashboardComponent } from './dashboard/dashboard';
import { CustomerProfileComponent } from './profile/profile';
import { CreateRfqComponent } from './create-rfq/create-rfq';
import { RfqListComponent } from './rfq-list/rfq-list';
import { RfqDetailComponent } from './rfq-detail/rfq-detail';
import { BidsComparisonComponent } from './bids-comparison/bids-comparison';
import { CustomerOrdersComponent } from './orders/orders';
import { CustomerMessagesComponent } from './messages/messages';
import { CustomerNotificationsComponent } from './notifications/notifications';
import { CustomerReviewsComponent } from './reviews/reviews';
import { CustomerInvoicesComponent } from './invoices/invoices';

export const customerRoutes: Routes = [
    { path: 'dashboard', component: CustomerDashboardComponent },
    { path: 'profile', component: CustomerProfileComponent },
    { path: 'create-rfq', component: CreateRfqComponent },
    { path: 'rfqs', component: RfqListComponent },
    { path: 'rfq/:id', component: RfqDetailComponent },
    { path: 'rfq/:id/compare', component: BidsComparisonComponent },
    { path: 'orders', component: CustomerOrdersComponent },
    { path: 'messages', component: CustomerMessagesComponent },
    { path: 'notifications', component: CustomerNotificationsComponent },
    { path: 'reviews', component: CustomerReviewsComponent },
    { path: 'invoices', component: CustomerInvoicesComponent }
];
