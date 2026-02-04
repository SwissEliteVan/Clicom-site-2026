-- Add quotes table
CREATE TABLE IF NOT EXISTS quotes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ref VARCHAR(20) NOT NULL UNIQUE COMMENT 'Format: DEV-YYYY-NNN',
    client_id INT NOT NULL,
    issue_date DATE NOT NULL,
    validity_date DATE NOT NULL,
    items JSON NOT NULL COMMENT 'JSON array of line items',
    subtotal DECIMAL(10,2) NOT NULL,
    tax DECIMAL(10,2) NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('draft', 'sent', 'accepted', 'rejected', 'invoiced') DEFAULT 'draft',
    token VARCHAR(64) NOT NULL UNIQUE COMMENT 'Access token for client view',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id)
);

-- Add invoices table
CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ref VARCHAR(20) NOT NULL UNIQUE COMMENT 'Format: FAC-YYYY-NNN',
    client_id INT NOT NULL,
    quote_id INT DEFAULT NULL,
    issue_date DATE NOT NULL,
    due_date DATE NOT NULL,
    items JSON NOT NULL COMMENT 'JSON array of line items',
    subtotal DECIMAL(10,2) NOT NULL,
    tax DECIMAL(10,2) NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('issued', 'paid', 'overdue', 'cancelled') DEFAULT 'issued',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id),
    FOREIGN KEY (quote_id) REFERENCES quotes(id)
);

-- Add token column to quotes table if needed
ALTER TABLE quotes ADD COLUMN IF NOT EXISTS token VARCHAR(64) NOT NULL UNIQUE COMMENT 'Access token for client view';

-- Generate initial tokens for existing quotes
UPDATE quotes SET token = SHA2(CONCAT(id, RAND()), 256) WHERE token = '' OR token IS NULL;