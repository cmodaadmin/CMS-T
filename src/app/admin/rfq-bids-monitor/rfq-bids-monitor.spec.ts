import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RfqBidsMonitor } from './rfq-bids-monitor';

describe('RfqBidsMonitor', () => {
  let component: RfqBidsMonitor;
  let fixture: ComponentFixture<RfqBidsMonitor>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RfqBidsMonitor]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RfqBidsMonitor);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
