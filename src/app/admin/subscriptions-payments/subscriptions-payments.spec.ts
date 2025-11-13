import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SubscriptionsPayments } from './subscriptions-payments';

describe('SubscriptionsPayments', () => {
  let component: SubscriptionsPayments;
  let fixture: ComponentFixture<SubscriptionsPayments>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SubscriptionsPayments]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SubscriptionsPayments);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
