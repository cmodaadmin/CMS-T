import { Routes } from '@angular/router';
import { Dashboard } from './dashboard/dashboard';
import { UserManagement } from './user-management/user-management';
import { VendorManagement } from './vendor-management/vendor-management';
import { RfqBidsMonitor } from './rfq-bids-monitor/rfq-bids-monitor';
import { OrdersMonitor } from './orders-monitor/orders-monitor';
import { SubscriptionsPayments } from './subscriptions-payments/subscriptions-payments';
import { SupportCenter } from './support-center/support-center';
import { ContentManagement } from './content-management/content-management';
import { NotificationsManagement } from './notifications-management/notifications-management';
import { Settings } from './settings/settings';

export const adminRoutes: Routes = [
    { path: 'dashboard', component: Dashboard },
    { path: 'users', component: UserManagement },
    { path: 'vendors', component: VendorManagement },
    { path: 'rfqs', component: RfqBidsMonitor },
    { path: 'orders', component: OrdersMonitor },
    { path: 'subscriptions', component: SubscriptionsPayments },
    { path: 'support', component: SupportCenter },
    { path: 'content', component: ContentManagement },
    { path: 'notifications', component: NotificationsManagement },
    { path: 'settings', component: Settings }
];
