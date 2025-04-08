import { describe, it, expect, vi } from 'vitest';
import '@testing-library/jest-dom';
import { render, screen } from '@testing-library/react';
import PlusIcon from '../components/PlusIcon';

describe('PlusIcon', () => {
  test('renders plus icon', () => {
    render(<PlusIcon />);
    expect(screen.getByRole('img', { name: /plus icon/i })).toBeInTheDocument();
  });
});
