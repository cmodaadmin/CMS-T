import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BidsManagement } from './bids-management';

describe('BidsManagement', () => {
  let component: BidsManagement;
  let fixture: ComponentFixture<BidsManagement>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [BidsManagement]
    })
    .compileComponents();

    fixture = TestBed.createComponent(BidsManagement);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
