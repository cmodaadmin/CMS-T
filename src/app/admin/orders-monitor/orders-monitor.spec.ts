import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OrdersMonitor } from './orders-monitor';

describe('OrdersMonitor', () => {
  let component: OrdersMonitor;
  let fixture: ComponentFixture<OrdersMonitor>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [OrdersMonitor]
    })
    .compileComponents();

    fixture = TestBed.createComponent(OrdersMonitor);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
